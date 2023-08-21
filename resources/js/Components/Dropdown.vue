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
import { formDataStore } from '../../data/formStore';

let success = ref(false);
let toggleModal = ref(false);
let pendingResponse = ref(false);

watch(() => formDataStore.errors, () => {
	mainMenus.forEach(menu => {
		menu.status = menu.elements.some(str => str in formDataStore.errors);
	});
});

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
		if (menu.title == name) {
			menu.status = !menu.status;
		}
	});
};
</script>

<template>
	<div class="container mx-auto max-xs:p-2 md:px-16">
		<div v-if="success" class="text-green-700 text-center p-3 mb-5">
			Die Anfrage war erfolgreich gesendet. Wir melden uns bei Ihnen sobald die Anfrage bearbeitet ist.
		</div>
		<form class="mt-7">
			<div class="space-y-1.5">
				<button type="button"
					class="bg-gradient-to-b from-yellow-100 via-yellow-300 to-yellow-500 hover:to-yellow-400 hover:text-white rounded-3xl focus:outline-none focus:to-yellow-400 focus:text-white font-mono text-sm xs:text-base sm:text-2xl tracking-widest py-4 w-full"
					:class="mainMenus[0].status ? 'bg-blue-200' : ''" @click="toggleMainMenu(mainMenus[0].title)">
					<div class="flex justify-between">
						<div class="m-auto">{{ mainMenus[0].title }}</div>
						<div class="mr-4">
							<i v-if="!mainMenus[0].status" class="fas fa-arrow-down mt-1" />
							<i v-if="mainMenus[0].status" class="fas fa-arrow-up mt-1" />
						</div>
					</div>
				</button>
				<contact-info v-show="mainMenus[0].status" />

				<button type="button"
					class="bg-gradient-to-b from-yellow-100 via-yellow-300 to-yellow-500 hover:to-yellow-400 hover:text-white rounded-3xl focus:outline-none focus:to-yellow-400 focus:text-white font-mono text-sm xs:text-base sm:text-2xl tracking-widest py-4 w-full"
					:class="mainMenus[1].status ? 'bg-blue-200' : ''" @click="toggleMainMenu(mainMenus[1].title)">
					<div class="flex justify-between">
						<div class="m-auto">{{ mainMenus[1].title }}</div>
						<div class="mr-4">
							<i v-if="!mainMenus[1].status" class="fas fa-arrow-down mt-1" />
							<i v-if="mainMenus[1].status" class="fas fa-arrow-up mt-1" />
						</div>
					</div>
				</button>
				<Appointment v-show="mainMenus[1].status" />

				<button type="button"
					class="bg-gradient-to-b from-yellow-100 via-yellow-300 to-yellow-500 hover:to-yellow-400 hover:text-white rounded-3xl focus:outline-none focus:to-yellow-400 focus:text-white font-mono text-sm xs:text-base sm:text-2xl tracking-widest py-4 w-full"
					:class="mainMenus[2].status ? 'bg-blue-200' : ''" @click="toggleMainMenu(mainMenus[2].title)">
					<div class="flex justify-between">
						<div class="m-auto">{{ mainMenus[2].title }}</div>
						<div class="mr-4">
							<i v-if="!mainMenus[2].status" class="fas fa-arrow-down mt-1" />
							<i v-if="mainMenus[2].status" class="fas fa-arrow-up mt-1" />
						</div>
					</div>
				</button>
				<AddressFromTo v-show="mainMenus[2].status" direction="from" />

				<button type="button"
					class="bg-gradient-to-b from-yellow-100 via-yellow-300 to-yellow-500 hover:to-yellow-400 hover:text-white rounded-3xl focus:outline-none focus:to-yellow-400 focus:text-white font-mono text-sm xs:text-base sm:text-2xl tracking-widest py-4 w-full"
					:class="mainMenus[3].status ? 'bg-blue-200' : ''" @click="toggleMainMenu(mainMenus[3].title)">
					<div class="flex justify-between">
						<div class="m-auto">{{ mainMenus[3].title }}</div>
						<div class="mr-4">
							<i v-if="!mainMenus[3].status" class="fas fa-arrow-down mt-1" />
							<i v-if="mainMenus[3].status" class="fas fa-arrow-up mt-1" />
						</div>
					</div>
				</button>
				<AddressFromTo v-show="mainMenus[3].status" direction="to" />

				<button type="button"
					class="bg-gradient-to-b from-yellow-100 via-yellow-300 to-yellow-500 hover:to-yellow-400 hover:text-white rounded-3xl focus:outline-none focus:to-yellow-400 focus:text-white font-mono text-sm xs:text-base sm:text-2xl tracking-widest py-4 w-full"
					:class="mainMenus[4].status ? 'bg-blue-200' : ''" @click="toggleMainMenu(mainMenus[4].title)">
					<div class="flex justify-between">
						<div class="m-auto">{{ mainMenus[4].title }}</div>
						<div class="mr-4">
							<i v-if="!mainMenus[4].status" class="fas fa-arrow-down mt-1" />
							<i v-if="mainMenus[4].status" class="fas fa-arrow-up mt-1" />
						</div>
					</div>
				</button>
				<Rooms v-show="mainMenus[4].status" />

				<button type="button"
					class="bg-gradient-to-b from-yellow-100 via-yellow-300 to-yellow-500 hover:to-yellow-400 hover:text-white rounded-3xl focus:outline-none focus:to-yellow-400 focus:text-white font-mono text-sm xs:text-base sm:text-2xl tracking-widest py-4 w-full"
					:class="mainMenus[5].status ? 'bg-blue-400' : ''" @click="toggleMainMenu(mainMenus[5].title)">
					<div class="flex justify-between">
						<div class="m-auto">{{ mainMenus[5].title }}</div>
						<div class="mr-4">
							<i v-if="!mainMenus[5].status" class="fas fa-arrow-down mt-1" />
							<i v-if="mainMenus[5].status" class="fas fa-arrow-up mt-1" />
						</div>
					</div>
				</button>
				<Services v-show="mainMenus[5].status" />
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