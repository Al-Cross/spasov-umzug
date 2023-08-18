import { formDataStore } from '../../data/formStore';

export function useAddItem(room, item) {
    const filledOutRoom = useFindRoom(room);
    filledOutRoom.contents.push(item);
}

export function useCreateNewRoom(room, items, boxType = null, numberOfBoxes = null) {
    const newRoom = {
        id: room.id,
        title: room.title,
        contents: [],
        ...(boxType === 'boxUnder80l' && { boxesUnder80l: numberOfBoxes }),
        ...(boxType === 'boxOver80l' && { boxesOver80l: numberOfBoxes })
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

export function useRemoveItem(room, object) {
    const filledOutRoom = useFindRoom(room);
    if (filledOutRoom) {
        const itemIndex = filledOutRoom.contents.findLastIndex(item => item.name === object.name);
        if (itemIndex !== -1) {
            filledOutRoom.contents.splice(itemIndex, 1);
        }
        if (filledOutRoom.contents.length === 0) {
            useRemoveRoom(filledOutRoom);
        }
    }
}

export function useRemoveRoom(filledOutRoom) {
    formDataStore.filledOutRooms = formDataStore.filledOutRooms
        .filter(room => room.title !== filledOutRoom.title);
}

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