import { reactive } from "vue";

export const mainMenus = reactive([
    {
        title: 'Auftraggeber',
        elements: ['anrede', 'vorname', 'nachname', 'telefon', 'email'],
        status: false
    },
    {
        title: 'Terminvereibarung',
        elements: ['date', 'kostentraeger', 'bemerkungen'],
        status: false
    },
    {
        title: 'Umzug von',
        elements: ['von_strasse', 'von_ort', 'von_etage', 'von_groesse', 'von_fahrstuhl', 'von_postleitzahl', 'von_land', 'von_raume', 'von_tragestrecke', 'von_gebaudeart'],
        status: false
    },
    {
        title: 'Umzug nach',
        elements: ['nach_strasse', 'nach_ort', 'nach_etage', 'nach_groesse', 'nach_fahrstuhl', 'nach_postleitzahl', 'nach_land', 'nach_raume', 'nach_tragestrecke', 'nach_gebaudeart'],
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