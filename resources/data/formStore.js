import { reactive } from "vue";

export const formDataStore = reactive({
    anrede: '',
    vorname: '',
    nachname: '',
    telefon: '',
    email: '',
    date: '',
    kostentraeger: '',
    bemerkungen: '',
    von_strasse: '',
    von_ort: '',
    von_etage: '',
    von_groesse: '',
    von_fahrstuhl: 'Nicht vorhanden',
    von_postleitzahl: '',
    von_land: '',
    von_raume: '',
    von_tragestrecke: '',
    von_gebaudeart: 'Mehrfamilienhaus',
    nach_strasse: '',
    nach_ort: '',
    nach_etage: '',
    nach_groesse: '',
    nach_fahrstuhl: 'Nicht vorhanden',
    nach_postleitzahl: '',
    nach_land: '',
    nach_raume: '',
    nach_tragestrecke: '',
    nach_gebaudeart: 'Mehrfamilienhaus',

    errors: []
});