<script setup>
import FormError from './FormError';
import { formDataStore } from '../../data/formStore';

const props = defineProps({ direction: String });

let formData = formDataStore;
function findPropName(name) {
    return props.direction === 'von' ? `von_${name}` : `nach_${name}`;
}
</script>

<template>
	<div class="grid grid-cols-1 md:grid-cols-2 gap-2 gap-x-10 bg-gradient-to-b from-blue-200 to-blue-100 rounded-2xl w-full p-6">
		<div class="flex flex-col space-y-1.5">
			<label class="tracking-wide text-gray-700 font-bold mb-2" for="strasse">
				Straße/ Nr. *
			</label>
			<input v-model="formData[findPropName('strasse')]" type="text"
				class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
			<form-error v-if="formData.errors[findPropName('strasse')]" :errors="formData.errors">
				{{ formData.errors[findPropName('strasse')][0] }}
			</form-error>
		</div>
		<div class="flex flex-col space-y-1.5">
			<label class="tracking-wide text-gray-700 font-bold mb-2" for="ort">Ort *</label>
			<input v-model="formData[findPropName('ort')]" type="text"
				class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
			<form-error v-if="formData.errors[findPropName('ort')]" :errors="formData.errors">
				{{ formData.errors[findPropName('ort')][0] }}
			</form-error>
		</div>
		<div class="grid md:grid-cols-none lg:grid-cols-2 grid-cols-2 gap-5 lg:gap-20">
			<div class="flex flex-col space-y-1.5 md:mb-2 lg:mb-0">
				<label class="tracking-wide text-gray-700 font-bold mb-2" for="etage">Etage</label>
				<input v-model="formData[findPropName('etage')]" type="text"
					class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
				<form-error v-if="formData.errors[findPropName('etage')]" :errors="formData.errors">
					{{ formData.errors[findPropName('etage')][0] }}
				</form-error>
			</div>
			<div class="flex flex-col space-y-1.5">
				<label class="tracking-wide text-gray-700 font-bold mb-2" for="groesse">Größe (in q. m.)
					*</label>
				<input v-model="formData[findPropName('groesse')]" type="text"
					class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
				<form-error v-if="formData.errors[findPropName('groesse')]" :errors="formData.errors">
					{{ formData.errors[findPropName('groesse')][0] }}
				</form-error>
			</div>
		</div>
		<div class="flex flex-col space-y-1.5">
			<label class="tracking-wide text-gray-700 font-bold mb-2" for="fahrstuhl">Fahrstuhl</label>
			<select v-model="formData[findPropName('fahrstuhl')]"
				class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200 w-48">
				<option value="Nicht vorhanden" selected>Nicht vorhanden</option>
				<option value="2-4 Personen">2-4 Personen</option>
				<option value="5-8 Personen">5-8 Personen</option>
				<option value="Lastenfahrstuhl">Lastenfahrstuhl</option>
			</select>
			<form-error v-if="formData.errors[findPropName('fahrstuhl')]" :errors="formData.errors">
				{{ formData.errors[findPropName('fahrstuhl')][0] }}
			</form-error>
		</div>
		<div class="flex flex-col space-y-1.5">
			<label class="tracking-wide text-gray-700 font-bold mb-2" for="postleitzahl">
				Postleitzahl *
			</label>
			<input v-model="formData[findPropName('postleitzahl')]" type="text"
				class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200 w-1/2 lg:w-1/4">
			<form-error v-if="formData.errors[findPropName('postleitzahl')]"
				:errors="formData.errors">
				{{ formData.errors[findPropName('postleitzahl')][0] }}
			</form-error>
		</div>
		<div class="flex flex-col space-y-1.5">
			<label class="tracking-wide text-gray-700 font-bold mb-2" for="land">Land *</label>
			<input v-model="formData[findPropName('land')]" type="text"
				class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
			<form-error v-if="formData.errors[findPropName('land')]" :errors="formData.errors">
				{{ formData.errors[findPropName('land')][0] }}
			</form-error>
		</div>
		<div class="grid md:grid-cols-none lg:grid-cols-2 grid-cols-2 gap-5 lg:gap-20">
			<div class="flex flex-col space-y-7 md:space-y-1.5">
				<label class="tracking-wide text-gray-700 font-bold mb-2" for="raume">
					Anzahl Räume *
				</label>
				<input v-model="formData[findPropName('raume')]" type="text"
					class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
				<form-error v-if="formData.errors[findPropName('raume')]" :errors="formData.errors">
					{{ formData.errors[findPropName('raume')][0] }}
				</form-error>
			</div>
			<div class="flex flex-col space-y-1.5">
				<label class="tracking-wide text-gray-700 font-bold mb-2" for="tragestrecke">
					Tragestrecke zum LKW (in m) *
				</label>
				<input v-model="formData[findPropName('tragestrecke')]" type="text"
					class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
				<form-error v-if="formData.errors[findPropName('tragestrecke')]"
					:errors="formData.errors">
					{{ formData.errors[findPropName('tragestrecke')][0] }}
				</form-error>
			</div>
		</div>
		<div class="flex flex-col space-y-1.5">
			<label class="tracking-wide text-gray-700 font-bold mb-2" for="gebaudeart">
				Gebäudeart
			</label>
			<select v-model="formData[findPropName('gebaudeart')]"
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
			<form-error v-if="formData.errors[findPropName('gebaudeart')]" :errors="formData.errors">
				{{ formData.errors[findPropName('gebaudeart')][0] }}
			</form-error>
		</div>
	</div>
</template>