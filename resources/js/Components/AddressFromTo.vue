<script setup>
import FormError from './FormError';
import { formDataStore } from '../../data/formStore';

const props = defineProps({ direction: String });

let formData = formDataStore;
function findPropName(name) {
    return props.direction === 'from' ? `from_${name}` : `to_${name}`;
}
</script>

<template>
	<div class="grid grid-cols-1 md:grid-cols-2 gap-2 gap-x-10 bg-gradient-to-b from-blue-200 to-blue-100 rounded-2xl w-full p-6">
		<div class="flex flex-col space-y-1.5">
			<label class="tracking-wide text-gray-700 font-bold mb-2" for="street">
				Straße/ Nr. *
			</label>
			<input id="street" v-model="formData[findPropName('street')]" type="text"
				class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
			<form-error v-if="formData.errors[findPropName('street')]" :errors="formData.errors">
				{{ formData.errors[findPropName('street')][0] }}
			</form-error>
		</div>
		<div class="flex flex-col space-y-1.5">
			<label class="tracking-wide text-gray-700 font-bold mb-2" for="location">Ort *</label>
			<input id="location" v-model="formData[findPropName('location')]" type="text"
				class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
			<form-error v-if="formData.errors[findPropName('location')]" :errors="formData.errors">
				{{ formData.errors[findPropName('location')][0] }}
			</form-error>
		</div>
		<div class="grid md:grid-cols-none lg:grid-cols-2 grid-cols-2 gap-5 lg:gap-20">
			<div class="flex flex-col space-y-1.5 md:mb-2 lg:mb-0">
				<label class="tracking-wide text-gray-700 font-bold mb-2" for="floor">Etage</label>
				<input id="floor" v-model="formData[findPropName('floor')]" type="text"
					class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
				<form-error v-if="formData.errors[findPropName('floor')]" :errors="formData.errors">
					{{ formData.errors[findPropName('floor')][0] }}
				</form-error>
			</div>
			<div class="flex flex-col space-y-1.5">
				<label class="tracking-wide text-gray-700 font-bold mb-2" for="sq_m">Größe (in q. m.)
					*</label>
				<input id="sq_m" v-model="formData[findPropName('sq_m')]" type="text"
					class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
				<form-error v-if="formData.errors[findPropName('sq_m')]" :errors="formData.errors">
					{{ formData.errors[findPropName('sq_m')][0] }}
				</form-error>
			</div>
		</div>
		<div class="flex flex-col space-y-1.5">
			<label class="tracking-wide text-gray-700 font-bold mb-2" for="elevator">
				Fahrstuhl
			</label>
			<select id="elevator" v-model="formData[findPropName('elevator')]"
				class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200 w-48">
				<option value="Nicht vorhanden" selected>Nicht vorhanden</option>
				<option value="2-4 Personen">2-4 Personen</option>
				<option value="5-8 Personen">5-8 Personen</option>
				<option value="Lastenfahrstuhl">Lastenfahrstuhl</option>
			</select>
			<form-error v-if="formData.errors[findPropName('elevator')]" :errors="formData.errors">
				{{ formData.errors[findPropName('elevator')][0] }}
			</form-error>
		</div>
		<div class="flex flex-col space-y-1.5">
			<label class="tracking-wide text-gray-700 font-bold mb-2" for="zip">
				Postleitzahl *
			</label>
			<input id="zip" v-model="formData[findPropName('zip')]" type="text"
				class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200 w-1/2 lg:w-1/4">
			<form-error v-if="formData.errors[findPropName('zip')]"
				:errors="formData.errors">
				{{ formData.errors[findPropName('zip')][0] }}
			</form-error>
		</div>
		<div class="flex flex-col space-y-1.5">
			<label class="tracking-wide text-gray-700 font-bold mb-2" for="province">Land *</label>
			<input id="province" v-model="formData[findPropName('province')]" type="text"
				class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
			<form-error v-if="formData.errors[findPropName('province')]" :errors="formData.errors">
				{{ formData.errors[findPropName('province')][0] }}
			</form-error>
		</div>
		<div class="grid md:grid-cols-none lg:grid-cols-2 grid-cols-2 gap-5 lg:gap-20">
			<div class="flex flex-col space-y-7 md:space-y-1.5">
				<label class="tracking-wide text-gray-700 font-bold mb-2" for="rooms">
					Anzahl Räume *
				</label>
				<input id="rooms" v-model="formData[findPropName('rooms')]" type="text"
					class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
				<form-error v-if="formData.errors[findPropName('rooms')]" :errors="formData.errors">
					{{ formData.errors[findPropName('rooms')][0] }}
				</form-error>
			</div>
			<div class="flex flex-col space-y-1.5">
				<label class="tracking-wide text-gray-700 font-bold mb-2" for="carry_distance">
					Tragestrecke zum LKW (in m) *
				</label>
				<input id="carry_distance" v-model="formData[findPropName('carry_distance')]"
					type="text"
					class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
				<form-error v-if="formData.errors[findPropName('carry_distance')]"
					:errors="formData.errors">
					{{ formData.errors[findPropName('carry_distance')][0] }}
				</form-error>
			</div>
		</div>
		<div class="flex flex-col space-y-1.5">
			<label class="tracking-wide text-gray-700 font-bold mb-2" for="building_type">
				Gebäudeart
			</label>
			<select id="building_type" v-model="formData[findPropName('building_type')]"
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
			<form-error v-if="formData.errors[findPropName('building_type')]" :errors="formData.errors">
				{{ formData.errors[findPropName('building_type')][0] }}
			</form-error>
		</div>
	</div>
</template>