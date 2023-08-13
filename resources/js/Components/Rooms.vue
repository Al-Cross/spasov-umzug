<script setup>
import { formDataStore } from '../../data/formStore';
import { rooms } from '../../data/menus';


function toggleRoom(roomName) {
	rooms.forEach(menu => {
		if (menu.title == roomName) {
			menu.status = !menu.status;
		}
	});
}

function addItem(room, object) {
	const roomHasItems = formDataStore.filledOutRooms
		.some(filledOutRoom => filledOutRoom.title === room.title);
	const item = {
		name: object.name,
		itemLength: '',
		width: '',
		height: ''
	};
	if (!roomHasItems) {
		const filledOutRoom = {
			id: room.id,
			title: room.title,
			contents: []
		}
		filledOutRoom.contents.push(item);
		formDataStore.filledOutRooms.push(filledOutRoom);
	} else {
		const filledOutRoom = findRoom(room);
		if (filledOutRoom) {
			filledOutRoom.contents.push(item);
		}
	}
	object.value++;
};

function removeItem(room, object) {
	if (object.value === 0) return;

	const filledOutRoom = findRoom(room);
	if (filledOutRoom) {
		const itemIndex = filledOutRoom.contents.findIndex(item => item.name === object.name);
		if (itemIndex !== -1) {
			filledOutRoom.contents.splice(itemIndex, 1);
		}
		if (filledOutRoom.contents.length === 0) {
			formDataStore.filledOutRooms = formDataStore.filledOutRooms
				.filter(room => room.title !== filledOutRoom.title);
		}
	}
	object.value--;
};

function findRoom(room) {
	return formDataStore.filledOutRooms.find(filled => filled.id === room.id);
}

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
	<div class="bg-gradient-to-b from-blue-201 to-blue-100 rounded-2xl w-full md:p-6">
		<div class="space-y-2.5 p-2">
			<template v-for="(menu, index) in rooms" :key="index">
				<button type="button"
					class="bg-gradient-to-b from-yellow-100 via-yellow-300 to-yellow-500 hover:to-yellow-400 hover:text-white rounded-3xl focus:outline-none focus:to-yellow-400 focus:text-white rounded-3xl focus:outline-none font-mono md:text-2xl tracking-widest py-4 w-full"
					:class="menu.status ? 'bg-blue-201' : ''" @click="toggleRoom(menu.title); columnize(menu)">
					<div class="flex justify-between">
						<div class="m-auto text-xs md:text-xl">{{ menu.title }}</div>
						<div class="mr-4">
							<i v-if="!menu.status" class="fas fa-arrow-down mt-1" />
							<i v-if="menu.status" class="fas fa-arrow-up mt-1" />
						</div>
					</div>
				</button>
				<div v-show="menu.status"
					class="grid grid-cols-2 md:grid-cols-2 bg-gradient-to-b from-blue-300 to-blue-200 rounded-2xl p-6 mt-2">
					<div v-for="(chunk, chunkIndex) in menu.chunked" :key="chunkIndex">
						<div v-for="(object, i) in chunk" :key="i" class="items-baseline text-center xl:flex mb-4">
							<div class="mb-2.5">
								<button type="button"
									class="transition duration-501 ease-in-out transform hover:-translate-y-1 hover:scale-75 bg-gradient-to-b from-yellow-100 via-yellow-300 to-yellow-500 hover:to-yellow-400 hover:text-white rounded-3xl focus:outline-none rounded h-8 w-8 mr-2"
									@click="removeItem(menu, object)">-</button>
								<input :id="object.name" v-model="object.value" type="text"
									class="border-1 rounded shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200 w-12 text-center mr-2"
									@change="calculateVolume(menu)">
								<button type="button"
									class="transition duration-501 ease-in-out transform hover:-translate-y-1 hover:scale-110 bg-gradient-to-b from-yellow-100 via-yellow-300 to-yellow-500 hover:to-yellow-400 hover:text-white rounded-3xl focus:outline-none rounded h-8 w-8 mr-2"
									@click="addItem(menu, object)">+</button>
							</div>
							<span class="fw-bold" v-text="object.name"></span>
						</div>
					</div>
				</div>
			</template>
		</div>
	</div>
</template>