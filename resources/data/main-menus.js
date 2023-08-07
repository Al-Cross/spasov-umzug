import { reactive } from "vue";

export const mainMenus = reactive([
    {
        title: 'Auftraggeber',
        elements: ['salutation', 'first_name', 'last_name', 'phone', 'email'],
        status: false
    },
    {
        title: 'Terminvereibarung',
        elements: ['date', 'cost_bearer', 'remarks'],
        status: false
    },
    {
        title: 'Umzug von',
        elements: [
            'from_street',
            'from_location',
            'from_floor',
            'from_sq_m',
            'from_elevator',
            'from_zip',
            'from_province',
            'from_rooms',
            'from_carry_distance',
            'from_building_type'
        ],
        status: false
    },
    {
        title: 'Umzug nach',
        elements: [
            'to_street',
            'to_location',
            'to_floor',
            'to_sq_m',
            'to_elevator',
            'to_zip',
            'to_province',
            'to_rooms',
            'to_carry_distance',
            'to_building_type'
        ],
        status: false
    },
    {
        title: 'Umzugsgüter',
        elements: [],
        status: false
    },
    {
        title: 'Sonstige Dienstleistungen',
        elements: [],
        status: false
    }
]);