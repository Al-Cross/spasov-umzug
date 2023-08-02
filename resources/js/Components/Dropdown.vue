<script>
import FormError from './FormError';

export default {
	components: { FormError },

	data() {
		return {
			menus: [
				{
					id: 0,
					title: 'Arbeitszimmer',
					contents: [{ name: 'Aktienschrank (laufende Meter)', value: 0, volume: Math.random()}, { name: 'Bücherregal, nicht zerlegbar (laufende Meter)', value: 0, volume: Math.random()}, { name: 'Deckenlampe', value: 0, volume: Math.random()}, { name: 'Rollcontainer', value: 0, volume: Math.random()}, { name: 'Schreibtisch (bis 1,6 m)', value: 0, volume: Math.random()}, { name: 'Schreibtischstuhl', value: 0, volume: Math.random()}, { name: 'Sessel ohne Armlehnen', value: 0, volume: Math.random()}, { name: 'Teppich', value: 0, volume: Math.random()}, { name: 'Tisch bis 1,0 m', value: 0, volume: Math.random()}, { name: 'Tisch über 1,2 m', value: 0, volume: Math.random()}, { name: 'Umzugskarton über 80 L', value: 0, volume: Math.random()}, { name: 'Brücke', value: 0, volume: Math.random()}, { name: 'Bücherregal, zerlegbar (laufende Meter)', value: 0, volume: Math.random()}, { name: 'Kommode', value: 0, volume: Math.random()}, { name: 'Schrank zerlegbar (laufende Meter)', value: 0, volume: Math.random()}, { name: 'Schreibtisch über 1,6 m', value: 0, volume: Math.random()}, { name: 'Sessel mit Armlehnen', value: 0, volume: Math.random()}, { name: 'Stehlampe', value: 0, volume: Math.random()}, { name: 'Tisch bis 0,6 m', value: 0, volume: Math.random()}, { name: 'Tisch über 1,2 m', value: 0, volume: Math.random()}, { name: 'Umzugskarton bis 80 L', value: 0, volume: Math.random()},
					],
					status: false,
					chunked: [],
					itemsPerColumn: 11,
					volume: 0
				},
				{
					id: 1,
					title: 'Diele / Bad',
					contents: [{ name: 'Deckenlampe', value: 0, volume: Math.random() }, { name: 'Regal', value: 0, volume: Math.random() }, { name: 'Teppich', value: 0, volume: Math.random() }, { name: 'Truhe, Kommode', value: 0, volume: Math.random() }, { name: 'Umzugskarton über 80 L', value: 0, volume: Math.random() }, { name: 'Wäschepuff', value: 0, volume: Math.random() }, { name: 'Hut-/Kleiderablage', value: 0, volume: Math.random() }, { name: 'Stuhl/Hocker', value: 0, volume: Math.random() }, { name: 'Toilettenschrank', value: 0, volume: Math.random() }, { name: 'Umzugskarton bis 80 L', value: 0, volume: Math.random() }, { name: 'Waschmaschine/Trockner', value: 0, volume: Math.random() }, { name: 'Wäschespinne', value: 0, volume: Math.random() },
					],
					status: false,
					chunked: [],
					itemsPerColumn: 6,
					volume: 0
				},
				{
					id: 2,
					title: 'Esszimmer',
					contents: [{ name: 'Brücke', value: 0, volume: Math.random() }, { name: 'Bücherregal, nicht zerlegbar (laufende Meter)', value: 0, volume: Math.random() }, { name: 'Deckenlampe', value: 0, volume: Math.random() }, { name: 'Hausbar', value: 0, volume: Math.random() }, { name: 'Sideboard', value: 0, volume: Math.random() }, { name: 'Stuhl mit Armlehnen', value: 0, volume: Math.random() }, { name: 'Teppich', value: 0, volume: Math.random() }, { name: 'Tisch bis 1,0 m', value: 0, volume: Math.random() }, { name: 'Tisch über 1,2 m', value: 0, volume: Math.random() }, { name: 'Umzugskarton über 80 L', value: 0, volume: Math.random() }, { name: 'Buffet ohne Aufsatz', value: 0, volume: Math.random() }, { name: 'Bücherregal, zerlegbar (laufende Meter)', value: 0, volume: Math.random() }, { name: 'Eckbank (Anzahl Sitzplätze)', value: 0, volume: Math.random() }, { name: 'Schrank, zerlegbar (laufende Meter)', value: 0, volume: Math.random() }, { name: 'Stuhl', value: 0, volume: Math.random() }, { name: 'Teewagen, nicht zerlegbar', value: 0, volume: Math.random() }, { name: 'Tisch bis 0,6 m', value: 0, volume: Math.random() }, { name: 'Tisch über 1,2 m', value: 0, volume: Math.random() }, { name: 'Umzugskarton bis 80 L', value: 0, volume: Math.random() }, { name: 'Vitrine (Glasschrank)', value: 0, volume: Math.random() },
					],
					status: false,
					chunked: [],
					itemsPerColumn: 10,
					volume: 0
				},
				{
					id: 3,
					title: 'Keller / Speicher / Garten',
					contents: [{ name: 'Autoreifen', value: 0, volume: Math.random() }, { name: 'Blumenkübel/Kasten', value: 0, volume: Math.random() }, { name: 'Dreirad/Kinderrad', value: 0, volume: Math.random() }, { name: 'Gartenwerkzeug', value: 0 }, { name: 'Kinderwagen', value: 0 }, { name: 'Koffer', value: 0 }, { name: 'Motorrad', value: 0, volume: Math.random() }, { name: 'Plastikbox', value: 0, volume: Math.random() }, { name: 'Rasenmäher, Motor', value: 0, volume: Math.random() }, { name: 'Schlitten', value: 0, volume: Math.random() }, { name: 'Schubkarre', value: 0, volume: Math.random() }, { name: 'Sonnenschirm', value: 0, volume: Math.random() }, { name: 'Umzugskarton über 80 L', value: 0, volume: Math.random() }, { name: 'Werkzeugkoffer', value: 0, volume: Math.random() }, { name: 'Billardtisch', value: 0, volume: Math.random() }, { name: 'Bügelbrett', value: 0, volume: Math.random() }, { name: 'Fahrrad/Moped', value: 0, volume: Math.random() }, { name: 'Kinderanhänger', value: 0, volume: Math.random() }, { name: 'Klapptisch/Klappstuhl', value: 0, volume: Math.random() }, { name: 'Leiter (je angefangener Meter)', value: 0, volume: Math.random() }, { name: 'Mülltonne', value: 0, volume: Math.random() }, { name: 'Rasenmäher, Hand', value: 0, volume: Math.random() }, { name: 'Regal, zerlegbar (je angefangener Meter)', value: 0, volume: Math.random() }, { name: 'Schrank, zerlegbar (laufende Meter)', value: 0, volume: Math.random() }, { name: 'Ski', value: 0, volume: Math.random() }, { name: 'Staubsauger', value: 0, volume: Math.random() }, { name: 'Umzugskarton bis 80 L', value: 0, volume: Math.random() }, { name: 'Werkbank, zerlegbar', value: 0, volume: Math.random() }, { name: 'Werkzeugschrank', value: 0, volume: Math.random() },
					],
					status: false,
					chunked: [],
					itemsPerColumn: 15,
					volume: 0
				},
				{
					id: 4,
					title: 'Kinderzimmer / Studio',
					contents: [{ name: 'Anbauwand bis 38 cm (laufende Meter)', value: 0, volume: Math.random() }, { name: 'Bett, komplett', value: 0, volume: Math.random() }, { name: 'Brücke', value: 0, volume: Math.random() }, { name: 'Bücherregal, zerlegbar (laufende Meter)', value: 0, volume: Math.random() }, { name: 'Etagenbett, komplett', value: 0, volume: Math.random() }, { name: 'Kleiderbehältnis', value: 0, volume: Math.random() }, { name: 'Kommode', value: 0, volume: Math.random() }, { name: 'Nachttisch', value: 0, volume: Math.random() }, { name: 'Schrank, zerlegbar (laufende Meter)', value: 0, volume: Math.random() }, { name: 'Spielzeugkiste', value: 0, volume: Math.random() }, { name: 'Teppich', value: 0, volume: Math.random() }, { name: 'Tisch bis 1,0 m', value: 0, volume: Math.random() }, { name: 'Tisch bis 1,2 m', value: 0, volume: Math.random() }, { name: 'Umzugskarton über 80 L', value: 0, volume: Math.random() }, { name: 'Anbauwand über 38 cm Tiefe (laufende Meter)', value: 0, volume: Math.random() }, { name: 'Bettzeug, je Betteinheit', value: 0, volume: Math.random() }, { name: 'Bücherregal, nicht zerlegbar (laufende Meter)', value: 0, volume: Math.random() }, { name: 'Deckenlampe', value: 0, volume: Math.random() }, { name: 'Kinderbett, komplett', value: 0, volume: Math.random() }, { name: 'Klettergerüst (je angefangener Meter)', value: 0, volume: Math.random() }, { name: 'Laufgitter', value: 0, volume: Math.random() }, { name: 'Schrank bis zwei Türen, nicht zerlegbar', value: 0, volume: Math.random() }, { name: 'Schreibpult', value: 0, volume: Math.random() }, { name: 'Stuhl/Hocker', value: 0, volume: Math.random() }, { name: 'Tisch bis 0,6 m', value: 0, volume: Math.random() }, { name: 'Tisch bis 1,2 m', value: 0, volume: Math.random() }, { name: 'Umzugskarton bis 80 L', value: 0, volume: Math.random() },
					],
					status: false,
					chunked: [],
					itemsPerColumn: 14,
					volume: 0
				},
				{
					id: 5,
					title: 'Küche',
					contents: [{ name: 'Arbeitsplatte, nicht unterbrochen (je angefangener Meter)', value: 0, volume: Math.random() }, { name: 'Buffet mit Aufsätzen', value: 0, volume: Math.random() }, { name: 'Eckbank (Anzahl Sitzplätze)', value: 0, volume: Math.random() }, { name: 'Herd', value: 0, volume: Math.random() }, { name: 'Kühlschrank/Truhe über 120 L', value: 0, volume: Math.random() }, { name: 'Stuhl', value: 0, volume: Math.random() }, { name: 'Tisch bis 0,6 m', value: 0, volume: Math.random() }, { name: 'Tisch bis 1,2 m', value: 0, volume: Math.random() }, { name: 'Umzugskarton bis 80 L', value: 0, volume: Math.random() }, { name: 'Unterteil (Anzahl Türen)', value: 0, volume: Math.random() }, { name: 'Besenschrank', value: 0, volume: Math.random() }, { name: 'Deckenlampe', value: 0, volume: Math.random() }, { name: 'Geschirrspülmaschine', value: 0, volume: Math.random() }, { name: 'Kühlschrank/Truhe bis 120 L', value: 0, volume: Math.random() }, { name: 'Oberteil (Anzahl Türen)', value: 0, volume: Math.random() }, { name: 'Teppich', value: 0, volume: Math.random() }, { name: 'Tisch bis 1,0 m', value: 0, volume: Math.random() }, { name: 'Tisch über 1,2 m', value: 0, volume: Math.random() }, { name: 'Umzugskarton über 80 L', value: 0, volume: Math.random() }, { name: 'Waschmaschine/Trockner', value: 0, volume: Math.random() },
					],
					status: false,
					chunked: [],
					itemsPerColumn: 10,
					volume: 0
				},
				{
					id: 6,
					title: 'Schlafzimmer',
					contents: [{ name: 'Bettumbau', value: 0, volume: Math.random() }, { name: 'Deckenlampe', value: 0, volume: Math.random() }, { name: 'Einzelbett, komplett', value: 0, volume: Math.random() }, { name: 'Frisierkommode mit Spiegel', value: 0, volume: Math.random() }, { name: 'Kommode', value: 0, volume: Math.random() }, { name: 'Schrank bis 2 Türen, nicht zerlegbar', value: 0, volume: Math.random() }, { name: 'Sideboard', value: 0, volume: Math.random() }, { name: 'Stuhl/Hocker', value: 0, volume: Math.random() }, { name: 'Umzugskarton über 80 L', value: 0, volume: Math.random() }, { name: 'Bettzeug (je Betteinheit)', value: 0, volume: Math.random() }, { name: 'Doppelbett, komplett', value: 0, volume: Math.random() }, { name: 'Französisches Bett, komplett', value: 0, volume: Math.random() }, { name: 'Kleiderbehältnis', value: 0, volume: Math.random() }, { name: 'Nachttisch', value: 0, volume: Math.random() }, { name: 'Schrank, zerlegbar (laufende Meter)', value: 0, volume: Math.random() }, { name: 'Spiegel über 0,8 m', value: 0, volume: Math.random() }, { name: 'Umzugskarton bis 80 L', value: 0, volume: Math.random() }, { name: 'Wäschetruhe', value: 0, volume: Math.random() },
					],
					status: false,
					chunked: [],
					itemsPerColumn: 9,
					volume: 0
				},
				{
					id: 7,
					title: 'Wohnzimmer',
					contents: [{ name: 'Anbauwand bis 38 cm Tiefe (laufende Meter)', value: 0, volume: Math.random() }, { name: 'Bilder über 0,8 m', value: 0, volume: Math.random() }, { name: 'Buffet mit Aufsatz', value: 0, volume: Math.random() }, { name: 'Bücherregal, zerlegbar (laufende Meter)', value: 0, volume: Math.random() }, { name: 'Fernseher', value: 0, volume: Math.random() }, { name: 'Heimorgel', value: 0, volume: Math.random() }, { name: 'Kommode', value: 0, volume: Math.random() }, { name: 'Musikschrank/Turm', value: 0, volume: Math.random() }, { name: 'Schreibtisch bis 1,6 m', value: 0, volume: Math.random() }, { name: 'Sekretär', value: 0, volume: Math.random() }, { name: 'Sessel ohne Armlehnen', value: 0, volume: Math.random() }, { name: 'Sitzlandschaft (Element), (Anzahl Sitzplätze)', value: 0, volume: Math.random() }, { name: 'Standuhr', value: 0, volume: Math.random() }, { name: 'Stereoanlage', value: 0, volume: Math.random() }, { name: 'Stuhl mit Armlehnen', value: 0, volume: Math.random() }, { name: 'Tisch bis 0,6 m', value: 0, volume: Math.random() }, { name: 'Tisch bis 1,2 m', value: 0, volume: Math.random() }, { name: 'Umzugskarton bis 80 L', value: 0, volume: Math.random() }, { name: 'Wohnzimmerschrank, zerlegbar (laufende Meter)', value: 0, volume: Math.random() }, { name: 'Anbauwand über 38 cm Tiefe (laufende Meter)', value: 0, volume: Math.random() }, { name: 'Brücke', value: 0, volume: Math.random() }, { name: 'Bücherregal, nicht zerlegbar (laufende Meter)', value: 0, volume: Math.random() }, { name: 'Deckenlampe', value: 0, volume: Math.random() }, { name: 'Flügel', value: 0, volume: Math.random() }, { name: 'Klavier', value: 0, volume: Math.random() }, { name: 'Lüster', value: 0, volume: Math.random() }, { name: 'Nähmaschine (Schrank)', value: 0, volume: Math.random() }, { name: 'Schreibtisch über 1,6 m', value: 0, volume: Math.random() }, { name: 'Sessel mit Armlehnen', value: 0, volume: Math.random() }, { name: 'Sideboard', value: 0, volume: Math.random() }, { name: 'Sofa, Couch, Liege (Anzahl Sitzplätze)', value: 0, volume: Math.random() }, { name: 'Stehlampe', value: 0, volume: Math.random() }, { name: 'Stuhl', value: 0, volume: Math.random() }, { name: 'Teppich', value: 0, volume: Math.random() }, { name: 'Tisch bis 1,0 m', value: 0, volume: Math.random() }, { name: 'Tisch über 1,2 m', value: 0, volume: Math.random() }, { name: 'Umzugskarton über 80 L', value: 0, volume: Math.random() },
					],
					status: false,
					chunked: [],
					itemsPerColumn: 19,
					volume: 0
				}
			],
			mainMenus: [
				{
					title: 'Auftraggeber',
					elements: ['anrede', 'vorname', 'nachname', 'telefon', 'email'],
					status: false,
				},
				{
					title: 'Terminvereibarung',
					elements: ['date', 'kostentraeger', 'bemerkungen'],
					status: false
				},
				{
					title: 'Umzug von',
					elements: ['von_strasse', 'von_ort', 'von_etage', 'von_groesse', 'von_fahrstuhl', 'von_postleitzahl', 'von_land', 'von_raume', 'von_tragestrecke', 'von_gebaudeart'],
					status: false,
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
			],
			formData: {
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
				nach_gebaudeart: 'Mehrfamilienhaus'
			},
			services: {
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
			},
			errors: [],
			success: false
		};
	},

	watch: {
		errors() {
			this.mainMenus.forEach(menu => {
				menu.elements.some(str => str in this.errors) ? menu.status = true : menu.status = false;
			});
		}
	},

	methods: {
		submit() {
			var rooms = [];
			var totalVolume = 0;

			this.menus.forEach(menu => {
				if (menu.volume != 0) {
					var room = { room: menu.title, roomVolume: menu.volume };
					room.elements = [];
					menu.contents.forEach(furniture => {
						if (furniture.value != 0) {
							var item = {};
							item.name = furniture.name;
							item.value = furniture.value;
							room.elements.push(item);
						}
					});

					totalVolume = totalVolume + menu.volume;
					rooms.push(room);
				}
			});

			axios.post('/calculator', {
				userData: this.formData,
				objects: rooms,
				totalVolume: totalVolume,
				loadingPoint: this.services.beladestelle,
				unloadingPoint: this.services.entladestelle
			})
			.then((response) => {
				this.success = true;
			})
			.catch(error => {
				this.errors = error.response.data.errors;
			});
		},

		toggleAccordion(name, submenu = false) {
			if (submenu) {
				this.menus.forEach(menu => {
					if (menu.title == name) {
						menu.status = !menu.status;
					}
				});
			} else {
				this.mainMenus.forEach(menu => {
					if (menu.title == name) {
						menu.status = !menu.status;
					} else {}
				});
			}
		},


		reduceVolume(room, object) {
			if(object.value === 0) return;

			room.volume == 0 ? room.volume = 0 : room.volume = room.volume - object.volume;
			object.value--;
		},

		increaseVolume(room, object) {
			room.volume = room.volume + object.volume;
			object.value++;
		},

		calculateVolume(room) {
			room.volume = 0;

			room.contents.forEach(roomObject => {
				room.volume += roomObject.volume * roomObject.value;
			});
		},

		columnize(menu) {
			if (menu.chunked.length == 0) {
				var i = 0;
				var length = menu.contents.length;

				while (i < length) {
					menu.chunked.push(menu.contents.slice(i, i += menu.itemsPerColumn));
				}
			}
		}
	}
};
</script>
