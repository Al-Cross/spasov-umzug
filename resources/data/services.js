import { reactive } from "vue"

export const services = reactive({
    type: [
        {
            name: 'Montage / Demontage',
            objects: ['Möbel', 'Lampen', 'Vorhänge', 'Küche', 'Installationsarbeiten']
        },
        {
            name: 'Verpacken und Entpacken',
            objects: ['Zerbrechliche Gegenstände', 'Alle Gegenstände']
        },
        {
            name: 'Halteverbotszone',
            objects: ['Genehmigung beantragen', 'Absperrung durch Auftragnehmer', 'Absperrung durch Auftraggeber', 'Absperrung nicht notwendig']
        }
    ],
    beladestelle: [],
    entladestelle: []
});