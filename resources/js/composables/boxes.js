import { useCreateNewRoom, useFindRoom, useRemoveRoom } from "./roomItems";

export function useAddBoxToRoom(room, box, boxType, numberOfBoxes) {
    const filledOutRoom = useFindRoom(room);
    if (filledOutRoom) {
        boxType === 'boxUnder80l'
            ? filledOutRoom.boxesUnder80l = numberOfBoxes
            : filledOutRoom.boxesOver80l = numberOfBoxes;
        const roomContainsBoxUnder80l = filledOutRoom.contents.some(item => item.isBoxUnder80l);
        const roomContainsBoxOver80l = filledOutRoom.contents.some(item => item.isBoxOver80l);
        if ((box.isBoxUnder80l && !roomContainsBoxUnder80l) || (box.isBoxOver80l && !roomContainsBoxOver80l)) {
            filledOutRoom.contents.push(box);
        }
    }
}

export function useAddMultipleBoxes(room, object, event) {
    const filledOutRoom = useFindRoom(room);
    const boxType = object.boxUnder80l ? 'boxUnder80l' : 'boxOver80l';
    let newBoxes = assignBoxes(event, object);

    if (filledOutRoom) {
        boxType === 'boxUnder80l'
            ? filledOutRoom.boxesUnder80l = +event.target.value
            : filledOutRoom.boxesOver80l = +event.target.value;
        filledOutRoom.contents = filledOutRoom.contents.filter(item => item.name !== object.name);
        filledOutRoom.contents.push(...newBoxes);
    } else {
        useCreateNewRoom(room, newBoxes, boxType, +event.target.value);
    }
    if (filledOutRoom && filledOutRoom.contents.length === 0) {
        useRemoveRoom(filledOutRoom);
    }
};

export function useCreateBox(box, boxType) {
    box[boxType] = true;
    return box;
}

export function useReduceBoxQuantity(room, boxName, boxType) {
    const filledOutRoom = useFindRoom(room);
    filledOutRoom[boxType]--;
    
    if (filledOutRoom[boxType] === 0) {
        removeBox(filledOutRoom, boxName);
    }
}

function removeBox(filledOutRoom, boxName) {
    filledOutRoom.contents = filledOutRoom.contents.filter(item => item.name !== boxName);
    if (filledOutRoom.contents.length === 0) {
        useRemoveRoom(filledOutRoom);
    }
}

function assignBoxes(event, object) {
    let box = { name: object.name };
    box = object.boxUnder80l
        ? useCreateBox(box, 'isBoxUnder80l')
        : useCreateBox(box, 'isBoxOver80l');

    return +event.target.value ? [box] : [];
}