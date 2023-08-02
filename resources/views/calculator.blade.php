<x-layout title="Spasovs Umzugsrechner">
    <x-header></x-header>
<dropdown inline-template>
    <div class="container mx-auto px-6 md:px-16">
        <div class="text-green-700 text-center p-3 mb-5" v-if="success">
            Die Anfrage war erfolgreich gesendet. Wir melden uns bei Ihnen sobald die Anfrage bearbeitet ist.
        </div>
        <form class="mt-7">
            <div class="space-y-1.5">
                 <button type="button"
                        class="bg-gradient-to-b from-yellow-100 via-yellow-300 to-yellow-500 hover:to-yellow-400 hover:text-white rounded-3xl focus:outline-none focus:to-yellow-400 focus:text-white font-mono text-2xl tracking-widest py-4 w-full"
                        :class="mainMenus[0].status ? 'bg-blue-200' : ''"
                        @click="toggleAccordion(mainMenus[0].title)">
                            @{{ mainMenus[0].title }}
                            <i v-if="!mainMenus[0].status" class="fas fa-arrow-down absolute lg:right-56"></i>
                            <i v-if="mainMenus[0].status" class="fas fa-arrow-up absolute lg:right-56"></i>
                 </button>
                <div class="md:grid md:grid-cols-2 gap-2 gap-x-10 bg-gradient-to-b from-blue-200 to-blue-100 transition duration-500 ease-in rounded-2xl w-full p-6"
                        v-show="mainMenus[0].status">
                    <div class="flex flex-col col-span-2 space-y-1.5">
                        <label class="tracking-wide text-gray-700 font-bold mb-2" for="anrede">Anrede *</label>
                        <select name="anrede"
                                v-model="formData.anrede"
                                class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200 w-36">
                            <option value="" disabled selected>Auswählen</option>
                            <option value="Frau">Frau</option>
                            <option value="Herr">Herr</option>
                        </select>
                        <form-error v-if="errors.anrede" :errors="errors">@{{ errors.anrede[0] }}</form-error>
                    </div>
                    <div class="flex flex-col space-y-1.5">
                        <label class="tracking-wide text-gray-700 font-bold mb-2" for="vorname">Vorname *</label>
                        <input type="text"
                                name="vorname"
                                class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200"
                                v-model="formData.vorname">
                        <form-error v-if="errors.vorname" :errors="errors">@{{ errors.vorname[0] }}</form-error>
                    </div>
                    <div class="flex flex-col space-y-1.5">
                        <label class="tracking-wide text-gray-700 font-bold mb-2" for="nachname">Nachname *</label>
                        <input type="text"
                                name="nachname"
                                class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200"
                                v-model="formData.nachname">
                        <form-error v-if="errors.nachname" :errors="errors">@{{ errors.nachname[0] }}</form-error>
                    </div>
                    <div class="flex flex-col space-y-1.5">
                        <label class="tracking-wide text-gray-700 font-bold mb-2" for="telefon">Telefonnummer *</label>
                        <input type="text"
                                name="telefon"
                                class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200"
                                v-model="formData.telefon">
                        <form-error v-if="errors.telefon" :errors="errors">@{{ errors.telefon[0] }}</form-error>
                    </div>
                    <div class="flex flex-col space-y-1.5">
                        <label class="tracking-wide text-gray-700 font-bold mb-2" for="email">Email Adresse *</label>
                        <input type="email"
                                name="email"
                                class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200"
                                v-model="formData.email">
                        <form-error v-if="errors.email" :errors="errors">@{{ errors.email[0] }}</form-error>
                    </div>
                </div>

                <button type="button"
                        class="bg-gradient-to-b from-yellow-100 via-yellow-300 to-yellow-500 hover:to-yellow-400 hover:text-white rounded-3xl focus:outline-none focus:to-yellow-400 focus:text-white rounded-3xl focus:outline-none font-mono text-2xl tracking-widest py-4 w-full"
                        :class="mainMenus[1].status ? 'bg-blue-200' : ''"
                        @click="toggleAccordion(mainMenus[1].title)">
                        @{{ mainMenus[1].title }}
                            <i v-if="!mainMenus[1].status" class="fas fa-arrow-down absolute lg:right-56"></i>
                            <i v-if="mainMenus[1].status" class="fas fa-arrow-up absolute lg:right-56"></i>
                </button>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 gap-x-10 bg-gradient-to-b from-blue-200 to-blue-100 rounded-2xl w-full p-6"
                        v-show="mainMenus[1].status">
                    <div class="flex flex-col space-y-1.5">
                        <label class="tracking-wide text-gray-700 font-bold mb-2" for="termin">Termin *</label>
                        <input type="date"
                                name="date"
                                v-model="formData.date"
                                class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
                        <form-error v-if="errors.date" :errors="errors">@{{ errors.date[0] }}</form-error>
                    </div>
                    <div>
                        <label class="tracking-wide text-gray-700 font-bold mb-2" for="kostentraeger">Kostenträger *</label>
                        <div>
                            <input type="radio" v-model="formData.kostentraeger" value="Selbst">
                            <label class="tracking-wide text-gray-700 font-bold mb-2 ml-1" for="selbst">Selbst</label>
                        </div>
                        <div>
                            <input type="radio" v-model="formData.kostentraeger" value="Arbeitgeber">
                            <label class="tracking-wide text-gray-700 font-bold mb-2 ml-1" for="Arbeitgeber">Arbeitgeber</label>
                        </div>
                        <div>
                            <input type="radio" v-model="formData.kostentraeger" value="Bundesagentur für Arbeit">
                            <label class="tracking-wide text-gray-700 font-bold mb-2 ml-1"
                                    for="Bundesagentur">Bundesagentur für Arbeit</label>
                        </div>
                        <div>
                            <input type="radio" v-model="formData.kostentraeger" value="Bundeswehr">
                            <label class="tracking-wide text-gray-700 font-bold mb-2 ml-1" for="Bundeswehr">Bundeswehr</label>
                        </div>
                        <form-error v-if="errors.kostentraeger" :errors="errors">@{{ errors.kostentraeger[0] }}</form-error>
                    </div>
                    <div class="flex flex-col md:col-span-2 lg:col-span-1 space-y-1.5">
                        <label class="tracking-wide text-gray-700 font-bold mb-2 ml-1" for="bemerkungen">Bemerkungen</label>
                        <textarea rows="7"
                                v-model="formData.bemerkungen"
                                class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
                        </textarea>
                        <form-error v-if="errors.bemerkungen" :errors="errors">@{{ errors.bemerkungen[0] }}</form-error>
                    </div>
                </div>

                <button type="button"
                        class="bg-gradient-to-b from-yellow-100 via-yellow-300 to-yellow-500 hover:to-yellow-400 hover:text-white rounded-3xl focus:outline-none focus:to-yellow-400 focus:text-white rounded-3xl focus:outline-none font-mono text-2xl tracking-widest py-4 w-full"
                        :class="mainMenus[2].status ? 'bg-blue-200' : ''"
                        @click="toggleAccordion(mainMenus[2].title)">
                        @{{ mainMenus[2].title }}
                            <i v-if="!mainMenus[2].status" class="fas fa-arrow-down absolute lg:right-56"></i>
                            <i v-if="mainMenus[2].status" class="fas fa-arrow-up absolute lg:right-56"></i>
                </button>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 gap-x-10 bg-gradient-to-b from-blue-200 to-blue-100 rounded-2xl w-full p-6"
                    v-show="mainMenus[2].status">
                    <div class="flex flex-col space-y-1.5">
                        <label class="tracking-wide text-gray-700 font-bold mb-2" for="strasse">Straße/ Nr. *</label>
                        <input type="text"
                            name="von_strasse"
                            v-model="formData.von_strasse"
                            class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
                        <form-error v-if="errors.von_strasse" :errors="errors">@{{ errors.von_strasse[0] }}</form-error>
                    </div>
                    <div class="flex flex-col space-y-1.5">
                        <label class="tracking-wide text-gray-700 font-bold mb-2" for="ort">Ort *</label>
                        <input type="text"
                            name="von_ort"
                            v-model="formData.von_ort"
                            class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
                        <form-error v-if="errors.von_ort" :errors="errors">@{{ errors.von_ort[0] }}</form-error>
                    </div>
                    <div class="grid md:grid-cols-none lg:grid-cols-2 grid-cols-2 gap-5 lg:gap-20">
                        <div class="flex flex-col space-y-1.5 md:mb-2 lg:mb-0">
                            <label class="tracking-wide text-gray-700 font-bold mb-2" for="etage">Etage</label>
                            <input type="text"
                                name="von_etage"
                                v-model="formData.von_etage"
                                class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
                            <form-error v-if="errors.von_etage" :errors="errors">@{{ errors.von_etage[0] }}</form-error>
                        </div>
                        <div class="flex flex-col space-y-1.5">
                            <label class="tracking-wide text-gray-700 font-bold mb-2" for="groesse">Größe (in q. m.) *</label>
                            <input type="text"
                                name="von_groesse"
                                v-model="formData.von_groesse"
                                class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
                            <form-error v-if="errors.von_groesse" :errors="errors">@{{ errors.von_groesse[0] }}</form-error>
                        </div>
                    </div>
                    <div class="flex flex-col space-y-1.5">
                        <label class="tracking-wide text-gray-700 font-bold mb-2" for="fahrstuhl">Fahrstuhl</label>
                        <select name="von_fahrstuhl"
                                v-model="formData.von_fahrstuhl"
                                class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200 w-48">
                            <option value="Nicht vorhanden" selected>Nicht vorhanden</option>
                            <option value="2-4 Personen">2-4 Personen</option>
                            <option value="5-8 Personen">5-8 Personen</option>
                            <option value="Lastenfahrstuhl">Lastenfahrstuhl</option>
                        </select>
                        <form-error v-if="errors.von_fahrstuhl" :errors="errors">@{{ errors.von_fahrstuhl[0] }}</form-error>
                    </div>
                    <div class="flex flex-col space-y-1.5">
                        <label class="tracking-wide text-gray-700 font-bold mb-2" for="postleitzahl">Postleitzahl *</label>
                        <input type="text"
                            name="von_postleitzahl"
                            v-model="formData.von_postleitzahl"
                            class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200 w-1/2 lg:w-1/4">
                        <form-error v-if="errors.von_postleitzahl" :errors="errors">@{{ errors.von_postleitzahl[0] }}</form-error>
                    </div>
                    <div class="flex flex-col space-y-1.5">
                        <label class="tracking-wide text-gray-700 font-bold mb-2" for="land">Land *</label>
                        <input type="text"
                            name="von_land"
                            v-model="formData.von_land"
                            class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
                        <form-error v-if="errors.von_land" :errors="errors">@{{ errors.von_land[0] }}</form-error>
                    </div>
                    <div class="grid md:grid-cols-none lg:grid-cols-2 grid-cols-2 gap-5 lg:gap-20">
                        <div class="flex flex-col space-y-7 md:space-y-1.5">
                            <label class="tracking-wide text-gray-700 font-bold mb-2" for="raume">Anzahl Räume *</label>
                            <input type="text"
                                name="von_raume"
                                v-model="formData.von_raume"
                                class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
                            <form-error v-if="errors.von_raume" :errors="errors">@{{ errors.von_raume[0] }}</form-error>
                        </div>
                        <div class="flex flex-col space-y-1.5">
                            <label class="tracking-wide text-gray-700 font-bold mb-2" for="tragestrecke">
                                Tragestrecke zum LKW (in m) *
                            </label>
                            <input type="text"
                                name="von_tragestrecke"
                                v-model="formData.von_tragestrecke"
                                class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
                            <form-error v-if="errors.von_tragestrecke" :errors="errors">@{{ errors.von_tragestrecke[0] }}</form-error>
                        </div>
                    </div>
                    <div class="flex flex-col space-y-1.5">
                        <label class="tracking-wide text-gray-700 font-bold mb-2" for="gebaudeart">Gebäudeart</label>
                        <select name="von_gebaudeart"
                                v-model="formData.von_gebaudeart"
                                class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200 lg:w-1/3">
                            <option value="Mehrfamilienhaus" selected>Mehrfamilienhaus</option>
                            <option value="Einfamilienhaus">Einfamilienhaus</option>
                            <option value="Doppelhaushalfte">Doppelhaushälfte</option>
                            <option value="Reihenhaus">Reihenhaus</option>
                            <option value="Maisonette">Maisonette-Wohnung</option>
                            <option value="Garage">Garage</option>
                            <option value="Lager">Lager</option>
                            <option value="Burogebaude">Bürogebäude</option>
                            <option value="Bungalow">Bungalow</option>
                        </select>
                        <form-error v-if="errors.von_gebaudeart" :errors="errors">@{{ errors.von_gebaudeart[0] }}</form-error>
                    </div>
                </div>

                 <button type="button"
                        class="bg-gradient-to-b from-yellow-100 via-yellow-300 to-yellow-500 hover:to-yellow-400 hover:text-white rounded-3xl focus:outline-none focus:to-yellow-400 focus:text-white rounded-3xl focus:outline-none font-mono text-2xl tracking-widest py-4 w-full"
                        :class="mainMenus[3].status ? 'bg-blue-200' : ''"
                        @click="toggleAccordion(mainMenus[3].title)">
                        @{{ mainMenus[3].title }}
                            <i v-if="!mainMenus[3].status" class="fas fa-arrow-down absolute lg:right-56"></i>
                            <i v-if="mainMenus[3].status" class="fas fa-arrow-up absolute lg:right-56"></i>
                </button>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 gap-x-10 bg-gradient-to-b from-blue-200 to-blue-100 rounded-2xl w-full p-6"
                    v-show="mainMenus[3].status">
                    <div class="flex flex-col space-y-1.5">
                        <label class="tracking-wide text-gray-700 font-bold mb-2" for="strasse">Straße/ Nr. *</label>
                        <input type="text"
                            name="nach_strasse"
                            v-model="formData.nach_strasse"
                            class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
                        <form-error v-if="errors.nach_strasse" :errors="errors">@{{ errors.nach_strasse[0] }}</form-error>
                    </div>
                    <div class="flex flex-col space-y-1.5">
                        <label class="tracking-wide text-gray-700 font-bold mb-2" for="ort">Ort *</label>
                        <input type="text"
                            name="nach_ort"
                            v-model="formData.nach_ort"
                            class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
                        <form-error v-if="errors.nach_ort" :errors="errors">@{{ errors.nach_ort[0] }}</form-error>
                    </div>
                    <div class="grid md:grid-cols-none lg:grid-cols-2 grid-cols-2 gap-5 lg:gap-20">
                        <div class="flex flex-col space-y-1.5 md:mb-2 lg:mb-0">
                            <label class="tracking-wide text-gray-700 font-bold mb-2" for="etage">Etage</label>
                            <input type="text"
                                name="nach_etage"
                                v-model="formData.nach_etage"
                                class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
                            <form-error v-if="errors.nach_etage" :errors="errors">@{{ errors.nach_etage[0] }}</form-error>
                        </div>
                        <div class="flex flex-col space-y-1.5">
                            <label class="tracking-wide text-gray-700 font-bold mb-2" for="groesse">Größe (in q. m.) *</label>
                            <input type="text"
                                name="nach_groesse"
                                v-model="formData.nach_groesse"
                                class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
                            <form-error v-if="errors.nach_groesse" :errors="errors">@{{ errors.nach_groesse[0] }}</form-error>
                        </div>
                    </div>
                    <div class="flex flex-col space-y-1.5">
                        <label class="tracking-wide text-gray-700 font-bold mb-2" for="fahrstuhl">Fahrstuhl</label>
                        <select name="nach_fahrstuhl"
                                v-model="formData.nach_fahrstuhl"
                                class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200 w-48">
                            <option value="Nicht vorhanden" selected>Nicht vorhanden</option>
                            <option value="2-4 personen">2-4 Personen</option>
                            <option value="5-8 personen">5-8 Personen</option>
                            <option value="Lastenfahrstuhl">Lastenfahrstuhl</option>
                        </select>
                        <form-error v-if="errors.nach_fahrstuhl" :errors="errors">@{{ errors.nach_fahrstuhl[0] }}</form-error>
                    </div>
                    <div class="flex flex-col space-y-1.5">
                        <label class="tracking-wide text-gray-700 font-bold mb-2" for="postleitzahl">Postleitzahl *</label>
                        <input type="text"
                            name="nach_postleitzahl"
                            v-model="formData.nach_postleitzahl"
                            class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200 w-1/2 lg:w-1/4">
                        <form-error v-if="errors.nach_postleitzahl" :errors="errors">@{{ errors.nach_postleitzahl[0] }}</form-error>
                    </div>
                    <div class="flex flex-col space-y-1.5">
                        <label class="tracking-wide text-gray-700 font-bold mb-2" for="land">Land *</label>
                        <input type="text"
                            name="nach_land"
                            v-model="formData.nach_land"
                            class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
                        <form-error v-if="errors.nach_land" :errors="errors">@{{ errors.nach_land[0] }}</form-error>
                    </div>
                    <div class="grid md:grid-cols-none lg:grid-cols-2 grid-cols-2 gap-5 lg:gap-20">
                        <div class="flex flex-col space-y-7 md:space-y-1.5">
                            <label class="tracking-wide text-gray-700 font-bold mb-2" for="raume">Anzahl Räume *</label>
                            <input type="text"
                                name="nach_raume"
                                v-model="formData.nach_raume"
                                class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
                            <form-error v-if="errors.nach_raume" :errors="errors">@{{ errors.nach_raume[0] }}</form-error>
                        </div>
                        <div class="flex flex-col space-y-1.5">
                            <label class="tracking-wide text-gray-700 font-bold mb-2" for="tragestrecke">Tragestrecke zum LKW (in m) *</label>
                            <input type="text"
                                name="nach_tragestrecke"
                                v-model="formData.nach_tragestrecke"
                                class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
                            <form-error v-if="errors.nach_tragestrecke" :errors="errors">@{{ errors.nach_tragestrecke[0] }}</form-error>
                        </div>
                    </div>
                    <div class="flex flex-col space-y-1.5">
                        <label class="tracking-wide text-gray-700 font-bold mb-2" for="gebaudeart">Gebäudeart</label>
                        <select name="nach_gebaudeart"
                                v-model="formData.nach_gebaudeart"
                                class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200 lg:w-1/3">
                            <option value="Mehrfamilienhaus" selected>Mehrfamilienhaus</option>
                            <option value="Einfamilienhaus">Einfamilienhaus</option>
                            <option value="Doppelhaushalfte">Doppelhaushälfte</option>
                            <option value="Reihenhaus">Reihenhaus</option>
                            <option value="Maisonette">Maisonette-Wohnung</option>
                            <option value="Garage">Garage</option>
                            <option value="Lager">Lager</option>
                            <option value="Burogebaude">Bürogebäude</option>
                            <option value="Bungalow">Bungalow</option>
                        </select>
                        <form-error v-if="errors.nach_gebaudeart" :errors="errors">@{{ errors.nach_gebaudeart[0] }}</form-error>
                    </div>
                </div>

                 <button type="button"
                        class="bg-gradient-to-b from-yellow-100 via-yellow-300 to-yellow-500 hover:to-yellow-400 hover:text-white rounded-3xl focus:outline-none focus:to-yellow-400 focus:text-white rounded-3xl focus:outline-none font-mono text-2xl tracking-widest py-4 w-full"
                        :class="mainMenus[4].status ? 'bg-blue-200' : ''"
                        @click="toggleAccordion(mainMenus[4].title)">
                        @{{ mainMenus[4].title }}
                            <i v-if="!mainMenus[4].status" class="fas fa-arrow-down absolute lg:right-56"></i>
                            <i v-if="mainMenus[4].status" class="fas fa-arrow-up absolute lg:right-56"></i>
                </button>
                <div class="bg-gradient-to-b from-blue-200 to-blue-100 rounded-2xl w-full md:p-6"
                    v-show="mainMenus[4].status">
                    <div class="space-y-1.5 p-2">
                        <template v-for="menu in menus.slice(0, 8)">
                            <button type="button"
                                    class="bg-gradient-to-b from-yellow-100 via-yellow-300 to-yellow-500 hover:to-yellow-400 hover:text-white rounded-3xl focus:outline-none focus:to-yellow-400 focus:text-white rounded-3xl focus:outline-none font-mono md:text-2xl tracking-widest py-4 w-full"
                                    :class="menu.status ? 'bg-blue-200' : ''"
                                    @click="toggleAccordion(menu.title, true); columnize(menu)">
                                <span class="text-xs md:text-xl">@{{ menu.title }}</span>
                                <span class="text-xs md:text-xl">@{{ menu.volume.toFixed(2) }} m <sup>3</sup></span>
                                <i v-if="!menu.status" class="fas fa-arrow-down absolute lg:right-56"></i>
                                <i v-if="menu.status" class="fas fa-arrow-up absolute lg:right-56"></i>
                            </button>
                            <div class="grid grid-cols-1 md:grid-cols-2 bg-gradient-to-b from-blue-300 to-blue-200 rounded-2xl p-6 mt-2" v-show="menu.status">
                                <div v-for="chunk in menu.chunked">
                                    <div v-for="(object, index) in chunk" class="items-baseline text-center xl:flex mb-3">
                                        <div class="mb-1.5">
                                            <button type="button"
                                                    class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-75 bg-gradient-to-b from-yellow-100 via-yellow-300 to-yellow-500 hover:to-yellow-400 hover:text-white rounded-3xl focus:outline-none rounded h-8 w-8 mr-2"
                                                    @click="reduceVolume(menu, object)">-</button>
                                            <input type="text"
                                                name="object"
                                                v-model="object.value"
                                                @change="calculateVolume(menu)"
                                                :id="object.name"
                                                class="border-0 rounded shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200 w-12 text-center mr-2">
                                            <button type="button"
                                                    class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110 bg-gradient-to-b from-yellow-100 via-yellow-300 to-yellow-500 hover:to-yellow-400 hover:text-white rounded-3xl focus:outline-none rounded h-8 w-8 mr-2"
                                                    @click="increaseVolume(menu, object)">+</button>
                                        </div>
                                        <span class="fw-bold" v-text="object.name"></span>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                 <button type="button"
                        class="bg-gradient-to-b from-yellow-100 via-yellow-300 to-yellow-500 hover:to-yellow-400 hover:text-white rounded-3xl focus:outline-none focus:to-yellow-400 focus:text-white rounded-3xl focus:outline-none font-mono text-2xl tracking-widest py-4 w-full"
                        :class="mainMenus[5].status ? 'bg-blue-400' : ''"
                        @click="toggleAccordion(mainMenus[5].title)">
                        @{{ mainMenus[5].title }}
                            <i v-if="!mainMenus[5].status" class="fas fa-arrow-down absolute lg:right-56"></i>
                            <i v-if="mainMenus[5].status" class="fas fa-arrow-up absolute lg:right-56"></i>
                </button>
                <div class="grid gap-2 bg-gradient-to-b from-blue-200 to-blue-100 rounded-2xl w-full p-6"
                    v-show="mainMenus[5].status">
                    <template v-for="service in services.type">
                        <span class="bg-blue-300 font-bold rounded p-2">@{{ service.name }}</span>
                        <div v-for="object in service.objects" class="grid lg:grid-cols-2 font-semibold text-lg m-2">
                            <span class="font-bold">@{{ object }}</span>
                            <div class="grid grid-cols-2">
                                <div>
                                    <input type="checkbox" v-model="services.beladestelle" :value="object">
                                    <label for="beladestelle">Beladestelle</label>
                                </div>
                                <div>
                                    <input type="checkbox" v-model="services.entladestelle" :value="object">
                                    <label for="entladestelle">Entladestelle</label>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                <button type="button" @click="submit()" class="bg-yellow-100 px-5 py-1.5 rounded-full mt-2">Anfrage senden</button>
            </div>
        </form>
    </div>
</dropdown>
</x-layout>
