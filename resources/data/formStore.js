import { reactive } from "vue";

export const formDataStore = reactive({
    salutation: '',
    first_name: '',
    last_name: '',
    phone: '',
    email: '',
    date: '',
    cost_bearer: '',
    remarks: '',
    from_street: '',
    from_location: '',
    from_floor: '',
    from_sq_m: '',
    from_elevator: 'Nicht vorhanden',
    from_zip: '',
    from_province: '',
    from_rooms: '',
    from_carry_distance: '',
    from_building_type: 'Mehrfamilienhaus',
    to_street: '',
    to_location: '',
    to_floor: '',
    to_sq_m: '',
    to_elevator: 'Nicht vorhanden',
    to_zip: '',
    to_province: '',
    to_rooms: '',
    to_carry_distance: '',
    to_building_type: 'Mehrfamilienhaus',

    errors: [],

    filledOutRooms: []
});

export function scrollIntoView(id) {
    const elementToScrollTo = document.getElementById(id);
    if (elementToScrollTo) {
        elementToScrollTo.scrollIntoView({ behavior: 'smooth' });
    }
}