import { reactive } from "vue";

export const rooms = reactive([
	{
		id: 0,
		title: 'Arbeitszimmer',
		contents: [
			{
				name: 'Aktienschrank',
				value: 0,
			},
			{
				name: 'Bücherregal, nicht zerlegbar',
				value: 0,
			},
			{
				name: 'Deckenlampe',
				value: 0,
			},
			{
				name: 'Rollcontainer',
				value: 0,
			},
			{
				name: 'Schreibtisch',
				value: 0,
			},
			{
				name: 'Schreibtischstuhl',
				value: 0,
			},
			{
				name: 'Sessel ohne Armlehnen',
				value: 0,
			},
			{
				name: 'Teppich',
				value: 0,
			},
			{
				name: 'Tisch',
				value: 0,
			},
			{
				name: 'Umzugskarton über 80 L',
				value: 0,
				boxOver80l: true
			},
			{
				name: 'Brücke',
				value: 0,
			},
			{
				name: 'Bücherregal, zerlegbar',
				value: 0,
			},
			{
				name: 'Kommode',
				value: 0,
			},
			{
				name: 'Schrank zerlegbar',
				value: 0,
			},
			{
				name: 'Sessel mit Armlehnen',
				value: 0,
			},
			{
				name: 'Stehlampe',
				value: 0,
			},
			{
				name: 'Umzugskarton bis 80 L',
				value: 0,
				boxUnder80l: true
			}
		],
		status: false,
		chunked: [],
		itemsPerColumn: 8,
		volume: 0
	},
	{
		id: 1,
		title: 'Diele / Bad',
		contents: [
			{
				name: 'Deckenlampe',
				value: 0,
			},
			{
				name: 'Regal',
				value: 0,
			},
			{
				name: 'Teppich',
				value: 0,
			},
			{
				name: 'Truhe, Kommode',
				value: 0,
			},
			{
				name: 'Umzugskarton über 80 L',
				value: 0,
				boxOver80l: true
			},
			{
				name: 'Wäschepuff',
				value: 0,
			},
			{
				name: 'Hut-/Kleiderablage',
				value: 0,
			},
			{
				name: 'Stuhl/Hocker',
				value: 0,
			},
			{
				name: 'Toilettenschrank',
				value: 0,
			},
			{
				name: 'Umzugskarton bis 80 L',
				value: 0,
				boxUnder80l: true
			},
			{
				name: 'Waschmaschine/Trockner',
				value: 0,
			},
			{
				name: 'Wäschespinne',
				value: 0,
			}
		],
		status: false,
		chunked: [],
		itemsPerColumn: 6,
		volume: 0
	},
	{
		id: 2,
		title: 'Esszimmer',
		contents: [
			{
				name: 'Brücke',
				value: 0,
			},
			{
				name: 'Bücherregal, nicht zerlegbar',
				value: 0,
			},
			{
				name: 'Deckenlampe',
				value: 0,
			},
			{
				name: 'Hausbar',
				value: 0,
			},
			{
				name: 'Sideboard',
				value: 0,
			},
			{
				name: 'Stuhl mit Armlehnen',
				value: 0,
			},
			{
				name: 'Teppich',
				value: 0,
			},
			{
				name: 'Tisch',
				value: 0,
			},
			{
				name: 'Umzugskarton über 80 L',
				value: 0,
				boxOver80l: true
			},
			{
				name: 'Buffet ohne Aufsatz',
				value: 0,
			},
			{
				name: 'Bücherregal, zerlegbar',
				value: 0,
			},
			{
				name: 'Eckbank',
				value: 0,
			},
			{
				name: 'Schrank, zerlegbar',
				value: 0,
			},
			{
				name: 'Stuhl',
				value: 0,
			},
			{
				name: 'Teewagen, nicht zerlegbar',
				value: 0,
			},
			{
				name: 'Umzugskarton bis 80 L',
				value: 0,
				boxUnder80l: true
			},
			{
				name: 'Vitrine (Glasschrank)',
				value: 0,
			}
		],
		status: false,
		chunked: [],
		itemsPerColumn: 8,
		volume: 0
	},
	{
		id: 3,
		title: 'Keller / Speicher / Garten',
		contents: [
			{
				name: 'Autoreifen',
				value: 0,
			},
			{
				name: 'Blumenkübel/Kasten',
				value: 0,
			},
			{
				name: 'Dreirad/Kinderrad',
				value: 0,
			},
			{
				name: 'Gartenwerkzeug',
				value: 0
			},
			{
				name: 'Kinderwagen',
				value: 0
			},
			{
				name: 'Koffer',
				value: 0
			},
			{
				name: 'Motorrad',
				value: 0,
			},
			{
				name: 'Plastikbox',
				value: 0,
			},
			{
				name: 'Rasenmäher, Motor',
				value: 0,
			},
			{
				name: 'Schlitten',
				value: 0,
			},
			{
				name: 'Schubkarre',
				value: 0,
			},
			{
				name: 'Sonnenschirm',
				value: 0,
			},
			{
				name: 'Umzugskarton über 80 L',
				value: 0,
				boxOver80l: true
			},
			{
				name: 'Werkzeugkoffer',
				value: 0,
			},
			{
				name: 'Billardtisch',
				value: 0,
			},
			{
				name: 'Bügelbrett',
				value: 0,
			},
			{
				name: 'Fahrrad/Moped',
				value: 0,
			},
			{
				name: 'Kinderanhänger',
				value: 0,
			},
			{
				name: 'Klapptisch/Klappstuhl',
				value: 0,
			},
			{
				name: 'Leiter',
				value: 0,
			},
			{
				name: 'Mülltonne',
				value: 0,
			},
			{
				name: 'Rasenmäher, Hand',
				value: 0,
			},
			{
				name: 'Regal, zerlegbar',
				value: 0,
			},
			{
				name: 'Schrank, zerlegbar',
				value: 0,
			},
			{
				name: 'Ski',
				value: 0,
			},
			{
				name: 'Staubsauger',
				value: 0,
			},
			{
				name: 'Umzugskarton bis 80 L',
				value: 0,
				boxUnder80l: true
			},
			{
				name: 'Werkbank, zerlegbar',
				value: 0,
			},
			{
				name: 'Werkzeugschrank',
				value: 0,
			}
		],
		status: false,
		chunked: [],
		itemsPerColumn: 15,
		volume: 0
	},
	{
		id: 4,
		title: 'Kinderzimmer / Studio',
		contents: [
			{
				name: 'Anbauwand',
				value: 0,
			},
			{
				name: 'Bett, komplett',
				value: 0,
			},
			{
				name: 'Brücke',
				value: 0,
			},
			{
				name: 'Bücherregal, zerlegbar',
				value: 0,
			},
			{
				name: 'Etagenbett, komplett',
				value: 0,
			},
			{
				name: 'Kleiderbehältnis',
				value: 0,
			},
			{
				name: 'Kommode',
				value: 0,
			},
			{
				name: 'Nachttisch',
				value: 0,
			},
			{
				name: 'Schrank, zerlegbar',
				value: 0,
			},
			{
				name: 'Spielzeugkiste',
				value: 0,
			},
			{
				name: 'Teppich',
				value: 0,
			},
			{
				name: 'Umzugskarton über 80 L',
				value: 0,
				boxOver80l: true
			},
			{
				name: 'Bettzeug',
				value: 0,
			},
			{
				name: 'Bücherregal, nicht zerlegbar',
				value: 0,
			},
			{
				name: 'Deckenlampe',
				value: 0,
			},
			{
				name: 'Kinderbett',
				value: 0,
			},
			{
				name: 'Klettergerüst',
				value: 0,
			},
			{
				name: 'Laufgitter',
				value: 0,
			},
			{
				name: 'Schreibpult',
				value: 0,
			},
			{
				name: 'Stuhl/Hocker',
				value: 0,
			},
			{
				name: 'Tisch',
				value: 0,
			},
			{
				name: 'Umzugskarton bis 80 L',
				value: 0,
				boxUnder80l: true
			}
		],
		status: false,
		chunked: [],
		itemsPerColumn: 11,
		volume: 0
	},
	{
		id: 5,
		title: 'Küche',
		contents: [
			{
				name: 'Arbeitsplatte',
				value: 0,
			},
			{
				name: 'Buffet mit Aufsätzen',
				value: 0,
			},
			{
				name: 'Eckbank',
				value: 0,
			},
			{
				name: 'Herd',
				value: 0,
			},
			{
				name: 'Kühlschrank/Truhe',
				value: 0,
			},
			{
				name: 'Stuhl',
				value: 0,
			},
			{
				name: 'Tisch',
				value: 0,
			},
			{
				name: 'Umzugskarton bis 80 L',
				value: 0,
				boxUnder80l: true
			},
			{
				name: 'Unterteil',
				value: 0,
			},
			{
				name: 'Besenschrank',
				value: 0,
			},
			{
				name: 'Deckenlampe',
				value: 0,
			},
			{
				name: 'Geschirrspülmaschine',
				value: 0,
			},
			{
				name: 'Oberteil',
				value: 0,
			},
			{
				name: 'Teppich',
				value: 0, volume: Math.random()
			},
			{
				name: 'Umzugskarton über 80 L',
				value: 0,
				boxOver80l: true
			},
			{
				name: 'Waschmaschine',
				value: 0,
			},
			{
				name: 'Trockner',
				value: 0,
			}
		],
		status: false,
		chunked: [],
		itemsPerColumn: 8,
		volume: 0
	},
	{
		id: 6,
		title: 'Schlafzimmer',
		contents: [
			{
				name: 'Bettumbau',
				value: 0,
			},
			{
				name: 'Deckenlampe',
				value: 0,
			},
			{
				name: 'Einzelbett, komplett',
				value: 0,
			},
			{
				name: 'Frisierkommode mit Spiegel',
				value: 0,
			},
			{
				name: 'Kommode',
				value: 0,
			},
			{
				name: 'Schrank, nicht zerlegbar',
				value: 0,
			},
			{
				name: 'Sideboard',
				value: 0,
			},
			{
				name: 'Stuhl/Hocker',
				value: 0,
			},
			{
				name: 'Umzugskarton über 80 L',
				value: 0,
				boxOver80l: true
			},
			{
				name: 'Bettzeug',
				value: 0,
			},
			{
				name: 'Doppelbett, komplett',
				value: 0,
			},
			{
				name: 'Französisches Bett, komplett',
				value: 0,
			},
			{
				name: 'Kleiderbehältnis',
				value: 0,
			},
			{
				name: 'Nachttisch',
				value: 0,
			},
			{
				name: 'Schrank, zerlegbar',
				value: 0,
			},
			{
				name: 'Spiegel',
				value: 0,
			},
			{
				name: 'Umzugskarton bis 80 L',
				value: 0,
				boxUnder80l: true
			},
			{
				name: 'Wäschetruhe',
				value: 0,
			}
		],
		status: false,
		chunked: [],
		itemsPerColumn: 9,
		volume: 0
	},
	{
		id: 7,
		title: 'Wohnzimmer',
		contents: [
			{
				name: 'Anbauwand',
				value: 0,
			},
			{
				name: 'Bilder',
				value: 0,
			},
			{
				name: 'Buffet mit Aufsatz',
				value: 0,
			},
			{
				name: 'Bücherregal, zerlegbar',
				value: 0,
			},
			{
				name: 'Fernseher',
				value: 0,
			},
			{
				name: 'Heimorgel',
				value: 0,
			},
			{
				name: 'Kommode',
				value: 0,
			},
			{
				name: 'Musikschrank/Turm',
				value: 0,
			},
			{
				name: 'Schreibtisch',
				value: 0,
			},
			{
				name: 'Sekretär',
				value: 0,
			},
			{
				name: 'Sessel ohne Armlehnen',
				value: 0,
			},
			{
				name: 'Sitzlandschaft',
				value: 0,
			},
			{
				name: 'Standuhr',
				value: 0,
			},
			{
				name: 'Stereoanlage',
				value: 0,
			},
			{
				name: 'Stuhl mit Armlehnen',
				value: 0,
			},
			{
				name: 'Tisch',
				value: 0,
			},
			{
				name: 'Umzugskarton bis 80 L',
				value: 0,
				boxUnder80l: true
			},
			{
				name: 'Wohnzimmerschrank, zerlegbar',
				value: 0,
			},
			{
				name: 'Brücke',
				value: 0,
			},
			{
				name: 'Bücherregal, nicht zerlegbar',
				value: 0,
			},
			{
				name: 'Deckenlampe',
				value: 0,
			},
			{
				name: 'Flügel',
				value: 0,
			},
			{
				name: 'Klavier',
				value: 0,
			},
			{
				name: 'Lüster',
				value: 0,
			},
			{
				name: 'Nähmaschine',
				value: 0,
			},
			{
				name: 'Sessel mit Armlehnen',
				value: 0,
			},
			{
				name: 'Sideboard',
				value: 0,
			},
			{
				name: 'Sofa, Couch, Liege',
				value: 0,
			},
			{
				name: 'Stehlampe',
				value: 0,
			},
			{
				name: 'Stuhl',
				value: 0,
			},
			{
				name: 'Teppich',
				value: 0,
			},
			{
				name: 'Umzugskarton über 80 L',
				value: 0,
				boxOver80l: true
			}
		],
		status: false,
		chunked: [],
		itemsPerColumn: 16,
		volume: 0
	}
]);