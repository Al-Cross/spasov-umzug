<script setup>
import { watch, ref } from 'vue';
import ContactInfo from './ContactInfo.vue';
import Appointment from './Appointment.vue';
import AddressFromTo from './AddressFromTo.vue';
import { rooms } from '../../data/menus';
import { mainMenus } from '../../data/main-menus';
import { services } from '../../data/services';
import { formDataStore } from '../../data/formStore';

let menus = rooms,
	formData = formDataStore,
	success = ref(false);

watch(() => formData.errors, () => {
	mainMenus.forEach(menu => {
		menu.elements.some(str => str in formData.errors) ? menu.status = true : menu.status = false;
	});
});

function submit() {
	let rooms = [];
	let totalVolume = 0;

	menus.forEach(menu => {
		if (menu.volume != 0) {
			let room = { room: menu.title, roomVolume: menu.volume };
			room.elements = [];
			menu.contents.forEach(furniture => {
				if (furniture.value != 0) {
					let item = {};
					item.name = furniture.name;
					item.value = furniture.value;
					room.elements.push(item);
				}
			});

			totalVolume = totalVolume + menu.volume;
			rooms.push(room);
		}
	});

	axios.post('/calculator', {
		userData: formData,
		objects: rooms,
		totalVolume: totalVolume,
		loadingPoint: services.beladestelle,
		unloadingPoint: services.entladestelle
	})
		.then(() => {
			success.value = true;
		})
		.catch(error => {
			formData.errors = error.response.data.errors;
		});
};

function toggleAccordion(name, submenu = false) {
	if (submenu) {
		menus.forEach(menu => {
			if (menu.title == name) {
				menu.status = !menu.status;
			}
		});
	} else {
		mainMenus.forEach(menu => {
			if (menu.title == name) {
				menu.status = !menu.status;
			}
		});
	}
};


function reduceVolume(room, object) {
	if (object.value === 0) return;

	room.volume == 0 ? room.volume = 0 : room.volume = room.volume - object.volume;
	object.value--;
};

function increaseVolume(room, object) {
	room.volume = room.volume + object.volume;
	object.value++;
};

function calculateVolume(room) {
	room.volume = 0;

	room.contents.forEach(roomObject => {
		room.volume += roomObject.volume * roomObject.value;
	});
};

function columnize(menu) {
	if (menu.chunked.length == 0) {
		var i = 0;
		var length = menu.contents.length;

		while (i < length) {
			menu.chunked.push(menu.contents.slice(i, i += menu.itemsPerColumn));
		}
	}
};
</script>

<template>
	<div class="container mx-auto px-6 md:px-16">
		<div v-if="success.value" class="text-green-700 text-center p-3 mb-5">
			Die Anfrage war erfolgreich gesendet. Wir melden uns bei Ihnen sobald die Anfrage bearbeitet ist.
		</div>
		<form class="mt-7">
			<div class="space-y-1.5">
				<button type="button"
					class="bg-gradient-to-b from-yellow-100 via-yellow-300 to-yellow-500 hover:to-yellow-400 hover:text-white rounded-3xl focus:outline-none focus:to-yellow-400 focus:text-white font-mono text-2xl tracking-widest py-4 w-full"
					:class="mainMenus[0].status ? 'bg-blue-200' : ''" @click="toggleAccordion(mainMenus[0].title)">
					{{ mainMenus[0].title }}
					<i v-if="!mainMenus[0].status" class="fas fa-arrow-down absolute lg:right-56" />
					<i v-if="mainMenus[0].status" class="fas fa-arrow-up absolute lg:right-56" />
				</button>
				<contact-info v-show="mainMenus[0].status" />

				<button type="button"
					class="bg-gradient-to-b from-yellow-100 via-yellow-300 to-yellow-500 hover:to-yellow-400 hover:text-white rounded-3xl focus:outline-none focus:to-yellow-400 focus:text-white rounded-3xl focus:outline-none font-mono text-2xl tracking-widest py-4 w-full"
					:class="mainMenus[1].status ? 'bg-blue-200' : ''" @click="toggleAccordion(mainMenus[1].title)">
					{{ mainMenus[1].title }}
					<i v-if="!mainMenus[1].status" class="fas fa-arrow-down absolute lg:right-56" />
					<i v-if="mainMenus[1].status" class="fas fa-arrow-up absolute lg:right-56" />
				</button>
				<Appointment v-show="mainMenus[1].status" />

				<button type="button"
					class="bg-gradient-to-b from-yellow-100 via-yellow-300 to-yellow-500 hover:to-yellow-400 hover:text-white rounded-3xl focus:outline-none focus:to-yellow-400 focus:text-white rounded-3xl focus:outline-none font-mono text-2xl tracking-widest py-4 w-full"
					:class="mainMenus[2].status ? 'bg-blue-200' : ''" @click="toggleAccordion(mainMenus[2].title)">
					{{ mainMenus[2].title }}
					<i v-if="!mainMenus[2].status" class="fas fa-arrow-down absolute lg:right-56" />
					<i v-if="mainMenus[2].status" class="fas fa-arrow-up absolute lg:right-56" />
				</button>
				<AddressFromTo v-show="mainMenus[2].status" direction="von" />

				<button type="button"
					class="bg-gradient-to-b from-yellow-100 via-yellow-300 to-yellow-500 hover:to-yellow-400 hover:text-white rounded-3xl focus:outline-none focus:to-yellow-400 focus:text-white rounded-3xl focus:outline-none font-mono text-2xl tracking-widest py-4 w-full"
					:class="mainMenus[3].status ? 'bg-blue-200' : ''" @click="toggleAccordion(mainMenus[3].title)">
					{{ mainMenus[3].title }}
					<i v-if="!mainMenus[3].status" class="fas fa-arrow-down absolute lg:right-56"></i>
					<i v-if="mainMenus[3].status" class="fas fa-arrow-up absolute lg:right-56"></i>
				</button>
				<AddressFromTo v-show="mainMenus[3].status" direction="nach" />

				<button type="button"
					class="bg-gradient-to-b from-yellow-100 via-yellow-300 to-yellow-500 hover:to-yellow-400 hover:text-white rounded-3xl focus:outline-none focus:to-yellow-400 focus:text-white rounded-3xl focus:outline-none font-mono text-2xl tracking-widest py-4 w-full"
					:class="mainMenus[4].status ? 'bg-blue-200' : ''" @click="toggleAccordion(mainMenus[4].title)">
					{{ mainMenus[4].title }}
					<i v-if="!mainMenus[4].status" class="fas fa-arrow-down absolute lg:right-56"></i>
					<i v-if="mainMenus[4].status" class="fas fa-arrow-up absolute lg:right-56"></i>
				</button>
				<div v-show="mainMenus[4].status"
					class="bg-gradient-to-b from-blue-200 to-blue-100 rounded-2xl w-full md:p-6">
					<div class="space-y-1.5 p-2">
						<template v-for="(menu, index) in menus.slice(0, 8)" :key="index">
							<button type="button"
								class="bg-gradient-to-b from-yellow-100 via-yellow-300 to-yellow-500 hover:to-yellow-400 hover:text-white rounded-3xl focus:outline-none focus:to-yellow-400 focus:text-white rounded-3xl focus:outline-none font-mono md:text-2xl tracking-widest py-4 w-full"
								:class="menu.status ? 'bg-blue-200' : ''"
								@click="toggleAccordion(menu.title, true); columnize(menu)">
								<span class="text-xs md:text-xl">{{ menu.title }}</span>
								<span class="text-xs md:text-xl">{{ menu.volume.toFixed(2) }} m <sup>3</sup></span>
								<i v-if="!menu.status" class="fas fa-arrow-down absolute lg:right-56"></i>
								<i v-if="menu.status" class="fas fa-arrow-up absolute lg:right-56"></i>
							</button>
							<div v-show="menu.status"
								class="grid grid-cols-1 md:grid-cols-2 bg-gradient-to-b from-blue-300 to-blue-200 rounded-2xl p-6 mt-2">
								<div v-for="(chunk, chunkIndex) in menu.chunked" :key="chunkIndex">
									<div v-for="(object, i) in chunk" :key="i"
										class="items-baseline text-center xl:flex mb-3">
										<div class="mb-1.5">
											<button type="button"
												class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-75 bg-gradient-to-b from-yellow-100 via-yellow-300 to-yellow-500 hover:to-yellow-400 hover:text-white rounded-3xl focus:outline-none rounded h-8 w-8 mr-2"
												@click="reduceVolume(menu, object)">-</button>
											<input :id="object.name" v-model="object.value" type="text" name="object"
												class="border-0 rounded shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200 w-12 text-center mr-2"
												@change="calculateVolume(menu)">
											<button type="button"
												class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110 bg-gradient-to-b from-yellow-100 via-yellow-300 to-yellow-500 hover:to-yellow-400 hover:text-white rounded-3xl focus:outline-none rounded h-8 w-8 mr-2"
												@click="increaseVolume(menu, object)">+</button>
										</div>
										<span class="fw-bold" v-text="object.name"></span>
									</div>
								</div>
							</div>
						</template>
					</div>
				</div>

				<button type="button"
					class="bg-gradient-to-b from-yellow-100 via-yellow-300 to-yellow-500 hover:to-yellow-400 hover:text-white rounded-3xl focus:outline-none focus:to-yellow-400 focus:text-white rounded-3xl focus:outline-none font-mono text-2xl tracking-widest py-4 w-full"
					:class="mainMenus[5].status ? 'bg-blue-400' : ''" @click="toggleAccordion(mainMenus[5].title)">
					{{ mainMenus[5].title }}
					<i v-if="!mainMenus[5].status" class="fas fa-arrow-down absolute lg:right-56"></i>
					<i v-if="mainMenus[5].status" class="fas fa-arrow-up absolute lg:right-56"></i>
				</button>
				<div v-show="mainMenus[5].status"
					class="grid gap-2 bg-gradient-to-b from-blue-200 to-blue-100 rounded-2xl w-full p-6">
					<template v-for="(service, index) in services.type" :key="index">
						<span class="bg-blue-300 font-bold rounded p-2">{{ service.name }}</span>
						<div v-for="(object, i) in service.objects" :key="i"
							class="grid lg:grid-cols-2 font-semibold text-lg m-2">
							<span class="font-bold">{{ object }}</span>
							<div class="grid grid-cols-2">
								<div>
									<input v-model="services.beladestelle" type="checkbox" :value="object">
									<label for="beladestelle">Beladestelle</label>
								</div>
								<div>
									<input v-model="services.entladestelle" type="checkbox" :value="object">
									<label for="entladestelle">Entladestelle</label>
								</div>
							</div>
						</div>
					</template>
				</div>

				<button type="button" class="bg-yellow-100 px-5 py-1.5 rounded-full mt-2" @click="submit()">Anfrage
					senden</button>
			</div>
		</form>
	</div>
</template>