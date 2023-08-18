<script setup>
import { onMounted, ref } from 'vue';
import { formDataStore } from '../../data/formStore';
import debounce from 'lodash.debounce';

const emits = defineEmits(['submitForm', 'closeModal']);
let error = ref(false);

onMounted(() => calculateVolumeOnRoomContentsChange());

const setLength = debounce((item, room, event) => {
	if (!validateInput(event.target.value)) return;
	item.itemLength = event.target.value;
	removeEmptyMetric(item, 'itemLength');
	calculateQubicMeters(room, item);
}, 300);

const setWidth = debounce((item, room, event) => {
	if (!validateInput(event.target.value)) return;
	item.width = event.target.value;
	removeEmptyMetric(item, 'width');
	calculateQubicMeters(room, item);
}, 300);

const setHeight = debounce((item, room, event) => {
	if (!validateInput(event.target.value)) return;
	item.height = event.target.value;
	removeEmptyMetric(item, 'height');
	calculateQubicMeters(room, item);
}, 300);

function calculateQubicMeters(room, item) {
	if (item.itemLength && item.width && item.height) {
		item.volume = (item.itemLength * item.width * item.height) / (100 * 100 * 100);
		item.volume = parseFloat(item.volume.toFixed(2));

		calculateRoomVolume(room);
	} else {
		delete item.volume;
		calculateRoomVolume(room);
	}
}

function calculateVolumeOnRoomContentsChange() {
	formDataStore.filledOutRooms.forEach(room => calculateRoomVolume(room));
}

function calculateRoomVolume(room) {
	const volume = room.contents.reduce((accumulator, item) => {
		if (item.volume) {
			accumulator += item.volume;
		}
		return accumulator;
	}, 0);
	room.volume = Math.round(volume * 100) / 100;
}

function removeEmptyMetric(item, metric) {
	if (item[metric] === '') {
		delete item[metric];
	}
}

function validateInput(input) {
	const validation = /^[0-9]*$/.test(input);
	error.value = !validation;
	return validation;
}

function submitForm() {
	emits('submitForm');
	closeModal();
}

function closeModal() {
	emits('closeModal');
}
</script>

<template>
	<div class="fixed flex justify-center items-center overflow-x-hidden overflow-y-auto inset-0">
		<div class="relative mx-auto sm:w-10/12 z-50">
			<div class="flex flex-col bg-white w-80 sm:w-full rounded shadow-2xl p-5">
				<div class="text-2xl text-center font-bold">
					Umzugsgüter Übersicht
				</div>
				<span class="text-center border-b-2 pb-3">
					Bitte geben Sie die Länge, Breite und Höhe der Gegenstände an.
					Dies hilft uns, das gesamten Volumen zu berechnen.
				</span>
				<div class="xl:grid xl:grid-cols-2 overflow-y-scroll h-80 lg:gap-2 mt-5">
					<div v-for="(room, index) in formDataStore.filledOutRooms" :key="index" class="mb-3">
						<span class="block text-sm font-bold border-b mb-2">
							{{ room.title }}
							<span v-if="room.volume" class="ml-3">
								{{ room.volume }} m<sup>3</sup>
							</span>
						</span>
						<div>
							<div v-for="(item, i) in room.contents" :key="i" :class="i % 2 !== 0 ? 'bg-blue-100' : ''"
								class="lg:flex lg:justify-between lg:items-center xl:gap-10 mt-2">
								<div>
									{{ item.name }}
									<span v-if="item.volume">{{ item.volume }} m<sup>3</sup></span>
									<span v-if="item.isBoxUnder80l">(x{{ room.boxesUnder80l }})</span>
									<span v-if="item.isBoxOver80l">(x{{ room.boxesOver80l }})</span>
								</div>
								<div v-if="!item.isBoxUnder80l && !item.isBoxOver80l"
									class="flex md:justify-center sm:gap-4">
									<div class="flex">
										<input :value="item.itemLength" type="text" class="w-[4rem] sm:w-20" placeholder="L"
											@input="setLength(item, room, $event)">
										<span class="self-end sm:ml-1 max-sm:mr-1">cm</span>
									</div>
									<div class="flex">
										<input :value="item.width" type="text" class="w-[4rem] sm:w-20" placeholder="B"
											@input="setWidth(item, room, $event)">
										<span class="self-end sm:ml-1 max-sm:mr-1">cm</span>
									</div>
									<div class="flex">
										<input :value="item.height" type="text" class="w-[4rem] sm:w-20" placeholder="H"
											@input="setHeight(item, room, $event)">
										<span class="self-end sm:ml-1 max-sm:mr-1">cm</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="border-t-2"></div>
				<div v-if="error" class="text-red-500 text-sm md:hidden">
					Die Eingabefelder dürfen nur numerische Zeichen enthalten.
				</div>
				<div class="flex justify-between sm:justify-end pt-3">
					<div v-if="error" class="hidden md:block self-center text-red-500 text-sm mr-10">
						Die Eingabefelder dürfen nur numerische Zeichen enthalten.
					</div>
					<button type="button" class="rounded border-2 border-black hover:bg-gray-200 px-4 py-2"
						@click="closeModal()">
						Schließen
					</button>
					<button type="button" class="rounded bg-yellow-300 hover:bg-yellow-400 px-4 py-2 ml-3"
						:class="{ 'opacity-50 cursor-not-allowed': error }" :disabled="error" @click="submitForm()">
						Anfrage senden
					</button>
				</div>
			</div>
		</div>
		<div class="absolute inset-0 opacity-25 bg-black z-40"></div>
	</div>
</template>