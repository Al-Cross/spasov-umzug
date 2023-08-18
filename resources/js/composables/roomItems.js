import { formDataStore } from '../../data/formStore';

export function useAddItem(room, item) {
    const filledOutRoom = useFindRoom(room);
    filledOutRoom.contents.push(item);
}

export function useCreateNewRoom(room, items, isBox) {
    const newRoom = {
        id: room.id,
        title: room.title,
        contents: [],
        ...(isBox && {
            boxesUnder80l: room.boxesUnder80l,
            boxesOver80l: room.boxesOver80l
        })
    };

    newRoom.contents.push(...items);
    formDataStore.filledOutRooms.push(newRoom);
}

export function useFindRoom(room) {
    return formDataStore.filledOutRooms.find(filled => filled.id === room.id);
}

export function useCalculateVolume(room, object, event) {
    const filledOutRoom = useFindRoom(room);
    let newItems = createItems(event, object);
    if (filledOutRoom) {
        filledOutRoom.contents = filledOutRoom.contents.filter(item => item.name !== object.name);
        filledOutRoom.contents.push(...newItems);
    } else {
        useCreateNewRoom(room, newItems, false);
    }
    if (filledOutRoom && filledOutRoom.contents.length === 0) {
        useRemoveRoom(filledOutRoom);
    }
};

function createItems(event, object) {
	let newItems = [];

	for (let i = 0; i < event.target.value; i++) {
		const item = {
			name: object.name,
			itemLength: '',
			width: '',
			height: ''
		};
		newItems.push(item);
	}
	return newItems;
}

export function useRemoveRoom(filledOutRoom) {
    formDataStore.filledOutRooms = formDataStore.filledOutRooms
        .filter(room => room.title !== filledOutRoom.title);
}