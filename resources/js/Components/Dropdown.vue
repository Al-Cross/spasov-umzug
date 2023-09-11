<script setup>
import { watch, ref } from 'vue';
import ContactInfo from './ContactInfo.vue';
import Appointment from './Appointment.vue';
import AddressFromTo from './AddressFromTo.vue';
import Rooms from './Rooms.vue';
import Services from './Services.vue';
import ItemOverviewModal from './ItemOverviewModal.vue';
import { mainMenus } from '../../data/main-menus';
import { services } from '../../data/services';
import { formDataStore, scrollIntoView } from '../../data/formStore';

let success = ref(false);
let toggleModal = ref(false);
let pendingResponse = ref(false);
let privacyPolicyAccepted = ref(false);
let showPrivacyPolicyErrorMessage = ref(false);

watch(() => formDataStore.errors, () => {
	mainMenus.forEach(menu => {
		menu.status = menu.elements.some(str => str in formDataStore.errors);
	});
});

watch(privacyPolicyAccepted, () => showPrivacyPolicyErrorMessage.value = false);

watch(toggleModal, (newValue) => {
	const scrollToTopElement = document.querySelector('.fade-small');
	if (newValue) {
		document.body.classList.add('overflow-hidden');
		scrollToTopElement.style.zIndex = -1;
	} else {
		document.body.classList.remove('overflow-hidden');
		scrollToTopElement.style.zIndex = 0;
	}
});

function onHandleFormSubmission() {
	formDataStore.filledOutRooms.length ? toggleModal.value = true : submit();
}

function submit() {
	if (!privacyPolicyAccepted.value) {
		return showPrivacyPolicyErrorMessage.value = true;
	}
	pendingResponse.value = true;
	let totalVolume = calculateTotalVolume();

	axios.post('/calculator', {
		userData: formDataStore,
		objects: formDataStore.filledOutRooms,
		totalVolume: totalVolume,
		loadingPoint: services.loadingPoint,
		unloadingPoint: services.unloadingPoint
	})
		.then(() => {
			success.value = true;
			pendingResponse.value = false;
		})
		.catch(error => {
			pendingResponse.value = false;
			if (error.response.status === 419 || error.response.status === 422) {
				formDataStore.errors = error.response.data.errors;
			}
		});
};

function calculateTotalVolume() {
	const volume = formDataStore.filledOutRooms.reduce((accumulator, room) => {
		if (room.volume) {
			accumulator += room.volume;
		}
		return accumulator;
	}, 0);

	return Math.round(volume * 100) / 100;
}

function toggleMainMenu(name) {
	mainMenus.forEach(menu => {
		menu.status = menu.title == name ? !menu.status : false;
	});
	if (name === 'Sonstige Dienstleistungen') {
		setTimeout(() => scrollIntoView(name), 600);
	}
};
</script>

<template>
	<div class="container mx-auto max-xs:p-2 lg:px-16">
		<div class="w-3/4 m-auto py-3 md:py-11">
			<span class="md:text-xl">
				Damit wir Ihnen eine genauere Einschätzung des Aufwands Ihres Umzugs geben können,
				brauchen wir von Ihnen die folgende Informationen:
			</span>
			<div class="flex gap-4 text-sm md:text-base max-sm:mb-2 mt-3">
				<img src="storage/images/hand.png" class="h-8 w-8" alt="hand_pointer" />
				<span>Ihre Kontaktdaten</span>
			</div>
			<div class="flex gap-4 text-sm md:text-base max-sm:mb-2">
				<img src="storage/images/hand.png" class="h-8 w-8" alt="hand_pointer" />
				<span>wann Sie den Umzug geplannt haben</span>
			</div>
			<div class="flex gap-4 text-sm md:text-base max-sm:mb-2">
				<img src="storage/images/hand.png" class="h-8 w-8" alt="hand_pointer" />
				<span>die Adressen, die für den Umzug wichtig sind</span>
			</div>
			<div class="flex gap-4 text-sm md:text-base max-sm:mb-2">
				<img src="storage/images/hand.png" class="h-8 w-8" alt="hand_pointer" />
				<span>
					die Umzugsgüter und deren Maßen. Nachdem Sie die gewünschte Umzugsgüter
					und deren Anzahl ausgewählt und auf dem Button "zum Übersicht" geklickt haben,
					haben Sie die Möglichkeit die Maßen jeden Gegenstands anzugeben.
				</span>
			</div>
		</div>
		<div v-if="success" class="text-green-700 text-center p-3 mb-5">
			Die Anfrage war erfolgreich gesendet. Wir melden uns bei Ihnen sobald die Anfrage bearbeitet ist.
		</div>
		<form class="mt-7">
			<div>
				<div class="cursor-pointer bg-yellow-300 hover:bg-yellow-200 hover:text-gray-500 font-mono text-sm xs:text-base sm:text-2xl tracking-widest w-full"
					:class="mainMenus[0].status ? 'bg-blue-200' : ''" @click="toggleMainMenu(mainMenus[0].title)">
					<div class="flex justify-between items-center py-4">
						<div class="ml-4">
							<i class="fas fa-address-card" />
						</div>
						<div class="m-auto">{{ mainMenus[0].title }}</div>
						<div class="mr-4">
							<i v-if="!mainMenus[0].status" class="fas fa-plus mt-1" />
							<i v-if="mainMenus[0].status" class="fas fa-minus mt-1" />
						</div>
					</div>
					<div class="grid cursor-default"
						:class="mainMenus[0].status ? 'grid-rows-[1fr] transition-[grid-template-rows] duration-700' : 'grid-rows-[0fr] transition-[grid-template-rows] duration-700'"
						@click.stop>
						<div class="overflow-hidden">
							<Contact-info />
						</div>
					</div>
				</div>

				<div class="cursor-pointer bg-yellow-300 hover:bg-yellow-200 hover:text-gray-500 font-mono text-sm xs:text-base sm:text-2xl tracking-widest w-full"
					:class="mainMenus[1].status ? 'bg-blue-200' : ''" @click="toggleMainMenu(mainMenus[1].title)">
					<div class="flex justify-between py-4">
						<div class="ml-4">
							<i class="fas fa-calendar-check" />
						</div>
						<div class="m-auto">{{ mainMenus[1].title }}</div>
						<div class="mr-4">
							<i v-if="!mainMenus[1].status" class="fas fa-plus mt-1" />
							<i v-if="mainMenus[1].status" class="fas fa-minus mt-1" />
						</div>
					</div>
					<div class="grid cursor-default"
						:class="mainMenus[1].status ? 'grid-rows-[1fr] transition-[grid-template-rows] duration-700' : 'grid-rows-[0fr] transition-[grid-template-rows] duration-700'"
						@click.stop>
						<div class="overflow-hidden">
							<Appointment />
						</div>
					</div>
				</div>

				<div class="cursor-pointer bg-yellow-300 hover:bg-yellow-200 hover:text-gray-500 font-mono text-sm xs:text-base sm:text-2xl tracking-widest w-full"
					:class="mainMenus[2].status ? 'bg-blue-200' : ''" @click="toggleMainMenu(mainMenus[2].title)">
					<div class="flex justify-between py-4">
						<div class="ml-4">
							<i class="fas fa-map-marked-alt" />
						</div>
						<div class="m-auto">{{ mainMenus[2].title }}</div>
						<div class="mr-4">
							<i v-if="!mainMenus[2].status" class="fas fa-plus mt-1" />
							<i v-if="mainMenus[2].status" class="fas fa-minus mt-1" />
						</div>
					</div>
					<div class="grid cursor-default"
						:class="mainMenus[2].status ? 'grid-rows-[1fr] transition-[grid-template-rows] duration-700' : 'grid-rows-[0fr] transition-[grid-template-rows] duration-700'"
						@click.stop>
						<div class="overflow-hidden">
							<AddressFromTo direction="from" />
						</div>
					</div>
				</div>

				<div class="cursor-pointer bg-yellow-300 hover:bg-yellow-200 hover:text-gray-500 font-mono text-sm xs:text-base sm:text-2xl tracking-widest w-full"
					:class="mainMenus[3].status ? 'bg-blue-200' : ''" @click="toggleMainMenu(mainMenus[3].title)">
					<div class="flex justify-between py-4">
						<div class="ml-4">
							<i class="fas fa-map-marked" />
						</div>
						<div class="m-auto">{{ mainMenus[3].title }}</div>
						<div class="mr-4">
							<i v-if="!mainMenus[3].status" class="fas fa-plus mt-1" />
							<i v-if="mainMenus[3].status" class="fas fa-minus mt-1" />
						</div>
					</div>
					<div class="grid cursor-default"
						:class="mainMenus[3].status ? 'grid-rows-[1fr] transition-[grid-template-rows] duration-700' : 'grid-rows-[0fr] transition-[grid-template-rows] duration-700'"
						@click.stop>
						<div class="overflow-hidden">
							<AddressFromTo direction="to" />
						</div>
					</div>
				</div>

				<div class="cursor-pointer bg-yellow-300 hover:bg-yellow-200 hover:text-gray-500 font-mono text-sm xs:text-base sm:text-2xl tracking-widest w-full"
					:class="mainMenus[4].status ? 'bg-blue-200' : ''" @click="toggleMainMenu(mainMenus[4].title)">
					<div class="flex justify-between py-4">
						<div class="ml-4">
							<i class="fas fa-couch" />
						</div>
						<div class="m-auto">{{ mainMenus[4].title }}</div>
						<div class="mr-4">
							<i v-if="!mainMenus[4].status" class="fas fa-plus mt-1" />
							<i v-if="mainMenus[4].status" class="fas fa-minus mt-1" />
						</div>
					</div>
					<div class="grid cursor-default"
						:class="mainMenus[4].status ? 'grid-rows-[1fr] transition-[grid-template-rows] duration-700' : 'grid-rows-[0fr] transition-[grid-template-rows] duration-700'"
						@click.stop>
						<div class="overflow-hidden">
							<Rooms />
						</div>
					</div>
				</div>

				<div :id="mainMenus[5].title"
					class="cursor-pointer bg-yellow-300 hover:bg-yellow-200 hover:text-gray-500 font-mono md:text-2xl tracking-widest w-full"
					:class="mainMenus[5].status ? 'bg-blue-400' : ''" @click="toggleMainMenu(mainMenus[5].title)">
					<div class="flex justify-between py-4">
						<div class="ml-4">
							<i class="fas fa-tools" />
						</div>
						<div class="m-auto text-xs sm:text-2xl">{{ mainMenus[5].title }}</div>
						<div class="mr-4">
							<i v-if="!mainMenus[5].status" class="fas fa-plus mt-1" />
							<i v-if="mainMenus[5].status" class="fas fa-minus mt-1" />
						</div>
					</div>
					<div class="grid cursor-default"
						:class="mainMenus[5].status ? 'grid-rows-[1fr] transition-[grid-template-rows] duration-700' : 'grid-rows-[0fr] transition-[grid-template-rows] duration-700'"
						@click.stop>
						<div class="overflow-hidden">
							<Services />
						</div>
					</div>
				</div>

				<div class="flex items-center gap-3 text-sm sm:text-base pt-8">
					<input v-model="privacyPolicyAccepted" type="checkbox" />
					<span>
						Ich bestätige, dass ich die
						<a href="#" class="text-blue-500 underline">Datenschutzerklärung</a>
						zur Kenntnis genommen habe.
					</span>
				</div>
				<div v-if="showPrivacyPolicyErrorMessage" class="text-red-500 text-xs italic">
					Fehlende Akzeptierung.
				</div>
				<div class="flex justify-end">
					<button type="button" class="bg-yellow-300 hover:bg-yellow-400 shadow px-5 py-1.5 rounded-full mt-2"
						@click="onHandleFormSubmission()">
						<div v-if="pendingResponse" class="lds-facebook">
							<div></div>
							<div></div>
							<div></div>
						</div>
						<span v-if="!pendingResponse">
							{{ formDataStore.filledOutRooms.length ? 'Zur Übersicht' : 'Anfrage senden' }}
						</span>
					</button>
				</div>
			</div>
		</form>
	</div>
	<ItemOverviewModal v-if="toggleModal" @submit-form="submit()" @close-modal="toggleModal = false" />
</template>