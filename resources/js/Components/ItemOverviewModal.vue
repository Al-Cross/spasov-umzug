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
        <div class="relative mx-auto w-auto md:max-w-2xl z-50">
            <div class="flex flex-col bg-white w-80 md:w-full rounded shadow-2xl p-5">
                <div class="text-2xl text-center font-bold border-b-2 pb-3">Umzugsgüter Übersicht</div>
                <span>
                    Bitte geben Sie die Länge, Breite und Höhe der Gegenstände an.
                    Dies hilft uns, das gesamten Volumen zu berechnen.
                </span>
                <div class="flex justify-between sm:justify-end border-t-2 pt-3">
                    <button type="button" class="rounded border-2 border-black hover:bg-gray-200 sm:w-2/12 px-4 py-2"
                        @click="closeModal()">
                        Schließen
                    </button>
                    <button type="button" class="rounded bg-yellow-300 hover:bg-yellow-400 sm:w-3/12 px-4 py-2 ml-3">
                        Anfrage senden
                    </button>
                </div>
            </div>
        </div>
        <div class="absolute inset-0 opacity-25 bg-black z-40"></div>
    </div>
</template>