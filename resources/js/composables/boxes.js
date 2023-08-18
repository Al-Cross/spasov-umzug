import { useCreateNewRoom, useFindRoom, useRemoveRoom } from "./roomItems";

export function useAddBoxToRoom(room, box) {
    const filledOutRoom = useFindRoom(room);
    if (filledOutRoom) {
        filledOutRoom.boxesUnder80l = room.boxesUnder80l;
        filledOutRoom.boxesOver80l = room.boxesOver80l;
        const boxUnder80l = filledOutRoom.contents.some(item => item.isBoxUnder80l);
        const boxOver80l = filledOutRoom.contents.some(item => item.isBoxOver80l);
        if ((box.isBoxUnder80l && !boxUnder80l) || (box.isBoxOver80l && !boxOver80l)) {
            filledOutRoom.contents.push(box);
        }
    }
}

export function useAddMultipleBoxes(room, object, event) {
    const filledOutRoom = useFindRoom(room);
    let newBoxes = assignBoxes(room, event, object);
    if (filledOutRoom) {
        filledOutRoom.boxesUnder80l = room.boxesUnder80l;
        filledOutRoom.boxesOver80l = room.boxesOver80l;
        filledOutRoom.contents = filledOutRoom.contents.filter(item => item.name !== object.name);
        filledOutRoom.contents.push(...newBoxes);
    } else {
        useCreateNewRoom(room, newBoxes, true);
    }
    if (filledOutRoom && filledOutRoom.contents.length === 0) {
        useRemoveRoom(filledOutRoom);
    }
};

export function useCreateBox(box, room, numberOfBoxes, boxType, roomBoxes) {
    box[boxType] = true;
    room[roomBoxes] = numberOfBoxes;
    return box;
}

function assignBoxes(room, event, object) {
    let box = { name: object.name };

    box = object.boxUnder80l
        ? useCreateBox(box, room, +event.target.value, 'isBoxUnder80l', 'boxesUnder80l')
        : useCreateBox(box, room, +event.target.value, 'isBoxOver80l', 'boxesOver80l');

    return +event.target.value ? [box] : [];
}