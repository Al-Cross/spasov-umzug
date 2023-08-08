<script setup>
import { formDataStore } from '../../data/formStore';

const emits = defineEmits(['closeModal']);

function calculateQubicMeters(room, item) {
    if (item.length && item.width && item.height) {
        item.volume = item.length * item.width * item.height;
    }
    room.volume = room.contents.reduce((acc, item) => {
        if (item.volume) {
            acc += item.volume;
        }
        return acc;
    }, 0);
}

function closeModal() {
    emits('closeModal');
}
</script>

<template>
	<div class="fixed flex justify-center items-center overflow-x-hidden overflow-y-auto inset-0">
		<div class="relative mx-auto sm:w-10/12 z-50">
			<div class="flex flex-col bg-white w-80 md:w-full rounded shadow-2xl p-5">
				<div class="text-2xl text-center font-bold border-b-2 pb-3">
					Umzugsgüter Übersicht
				</div>
				<span>
					Bitte geben Sie die Länge, Breite und Höhe der Gegenstände an.
					Dies hilft uns, das gesamten Volumen zu berechnen.
				</span>
				<div class="lg:grid lg:grid-cols-2 lg:gap-2">
					<div v-for="(room, index) in formDataStore.filledOutRooms" :key="index" class="mb-3">
						<span class="block text-sm font-bold border-b mb-2">{{ room.title }}</span>
						<div>
							<div v-for="(item, i) in room.contents" :key="i"
								:class="i % 2 !== 0 ? 'bg-blue-100' : ''"
								class="lg:flex lg:justify-between lg:items-center xl:gap-10 mt-2">
								<div>{{ item.name }}</div>
								<div class="flex md:justify-center gap-4">
									<input type="text" class="w-20" placeholder="L">
									<input type="text" class="w-20" placeholder="B">
									<input type="text" class="w-20" placeholder="H">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="flex justify-between sm:justify-end border-t-2 pt-3">
					<button type="button" class="rounded border-2 border-black hover:bg-gray-200 px-4 py-2"
						@click="closeModal()">
						Schließen
					</button>
					<button type="button" class="rounded bg-yellow-300 hover:bg-yellow-400 px-4 py-2 ml-3">
						Anfrage senden
					</button>
				</div>
			</div>
		</div>
		<div class="absolute inset-0 opacity-25 bg-black z-40"></div>
	</div>
</template>