<script setup>
import { formDataStore, scrollIntoView } from '../../data/formStore';
import { rooms } from '../../data/menus';
import { useCreateNewRoom, useAddItem, useCalculateVolume, useRemoveItem } from '../composables/roomItems';
import { useAddBoxToRoom, useCreateBox, useAddMultipleBoxes, useReduceBoxQuantity } from '../composables/boxes';


function toggleRoom(roomName) {
	rooms.forEach(menu => {
		menu.status = menu.title == roomName ? !menu.status : false;
	});
	setTimeout(() => scrollIntoView(roomName), 600);
}

function onAddItem(room, object) {
	object.value++;
	const roomExists = formDataStore.filledOutRooms
		.some(filledOutRoom => filledOutRoom.title === room.title);
	let item = {
		name: object.name,
		itemLength: '',
		width: '',
		height: ''
	};
	roomExists ? useAddItem(room, item) : useCreateNewRoom(room, [item], false);
};

function onAddBox(room, object) {
	object.value++;
	const roomExists = formDataStore.filledOutRooms
		.some(filledOutRoom => filledOutRoom.title === room.title);
	const boxType = object.boxUnder80l ? 'boxUnder80l' : 'boxOver80l';
	let box = { name: object.name };

	box = boxType === 'boxUnder80l'
		? useCreateBox(box, 'isBoxUnder80l')
		: useCreateBox(box, 'isBoxOver80l');

	roomExists
		? useAddBoxToRoom(room, box, boxType, +object.value)
		: useCreateNewRoom(room, [box], boxType, +object.value);
}

function onRemoveItem(room, object) {
	if (object.value === 0) return;

	useRemoveItem(room, object);
	object.value--;
};

function onRemoveBox(room, object) {
	if (object.value === 0) return;

	object.boxUnder80l
		? useReduceBoxQuantity(room, object.name, 'boxesUnder80l')
		: useReduceBoxQuantity(room, object.name, 'boxesOver80l');
	object.value--;
}

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
	<div class="rounded-2xl w-full md:p-6">
		<div class="p-2">
			<template v-for="(menu, index) in rooms" :key="index">
				<div :id="menu.title"
					class="cursor-pointer bg-yellow-400 hover:text-gray-500 font-mono md:text-2xl tracking-widest w-full"
					:class="menu.status ? 'bg-blue-201' : 'hover:to-yellow-600'"
					@click="toggleRoom(menu.title); columnize(menu)">
					<div class="flex justify-between py-4">
						<div class="m-auto text-xs md:text-xl">{{ menu.title }}</div>
						<div class="mr-4">
							<i v-if="!menu.status" class="fas fa-plus mt-1" />
							<i v-if="menu.status" class="fas fa-minus mt-1" />
						</div>
					</div>
					<div class="grid cursor-default"
						:class="menu.status ? 'grid-rows-[1fr] transition-[grid-template-rows] duration-700' : 'grid-rows-[0fr] transition-[grid-template-rows] duration-700'"
						@click.stop>
						<div class="overflow-hidden bg-gray-200">
							<div class="grid grid-cols-2 md:grid-cols-2 p-2 md:p-6 mt-2">
								<div v-for="(chunk, chunkIndex) in menu.chunked" :key="chunkIndex">
									<div v-for="(object, i) in chunk" :key="i"
										class="items-baseline text-center xl:flex max-md:h-24 mb-4">
										<div class="mb-2.5">
											<button type="button"
												class="transition duration-200 ease-in-out hover:-translate-y-1 hover:scale-75 touch-manipulation bg-gradient-to-b from-yellow-100 via-orange-300 to-orange-400 hover:to-orange-500 hover:text-white rounded-3xl focus:outline-none h-8 w-8 mr-2"
												@click="object.boxUnder80l || object.boxOver80l ? onRemoveBox(menu, object) : onRemoveItem(menu, object)">-</button>
											<input :id="object.name" v-model="object.value" type="text" inputmode="numeric"
												class="border-1 rounded shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200 w-12 text-center mr-2"
												@change="object.boxUnder80l || object.boxOver80l ? useAddMultipleBoxes(menu, object, $event) : useCalculateVolume(menu, object, $event)" />
											<button type="button"
												class="transition duration-200 ease-in-out hover:-translate-y-1 hover:scale-110 touch-manipulation bg-gradient-to-b from-yellow-100 via-orange-300 to-orange-400 hover:to-orange-500 hover:text-white rounded-3xl focus:outline-none h-8 w-8 mr-2"
												@click="object.boxUnder80l || object.boxOver80l ? onAddBox(menu, object) : onAddItem(menu, object)">+</button>
										</div>
										<span class="text-xs sm:text-base fw-bold" v-text="object.name"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</template>
		</div>
	</div>
</template>