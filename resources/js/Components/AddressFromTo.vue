<script setup>
import FormError from './FormError';
import { formDataStore } from '../../data/formStore';
import { provinces, elevator, buildingTypes } from '../../data/dropdowns';

const props = defineProps({ direction: String });

let formData = formDataStore;
function findPropName(name) {
	return props.direction === 'from' ? `from_${name}` : `to_${name}`;
}
</script>

<template>
	<div class="grid grid-cols-1 sm:grid-cols-2 gap-2 gap-x-6 lg:gap-x-10 bg-gray-200 w-full p-6">
		<div class="flex flex-col space-y-1.5 mb-3">
			<label class="tracking-wide text-gray-700 text-sm md:text-base font-bold" for="street">
				Straße/ Nr. *
			</label>
			<input id="street" v-model="formData[findPropName('street')]" type="text"
				class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200" />
			<form-error v-if="formData.errors[findPropName('street')]" :error-source="findPropName('street')">
				{{ formData.errors[findPropName('street')][0] }}
			</form-error>
		</div>
		<div class="flex flex-col space-y-1.5 mb-3">
			<label class="tracking-wide text-gray-700 text-sm md:text-base font-bold" for="location">
				Ort *
			</label>
			<input id="location" v-model="formData[findPropName('location')]" type="text"
				class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200" />
			<form-error v-if="formData.errors[findPropName('location')]" :error-source="findPropName('location')">
				{{ formData.errors[findPropName('location')][0] }}
			</form-error>
		</div>
		<div class="flex flex-col space-y-1.5 mb-3">
			<label class="tracking-wide text-gray-700 text-sm md:text-base font-bold" for="zip">
				Postleitzahl *
			</label>
			<input id="zip" v-model="formData[findPropName('zip')]" type="text"
				class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200 lg:w-[10rem] xl:w-[14rem]" />
			<form-error v-if="formData.errors[findPropName('zip')]" :error-source="findPropName('zip')">
				{{ formData.errors[findPropName('zip')][0] }}
			</form-error>
		</div>
		<div class="flex flex-col space-y-1.5 mb-3">
			<label class="tracking-wide text-gray-700 text-sm md:text-base font-bold" for="province">
				Land *
			</label>
			<select id="province" v-model="formData[findPropName('province')]"
				class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200 cursor-pointer">
				<option disabled selected value="">Auswählen</option>
				<option v-for="(province, index) in provinces" :key="index" :value="province">
					{{ province }}
				</option>
			</select>
			<form-error v-if="formData.errors[findPropName('province')]" :error-source="findPropName('province')">
				{{ formData.errors[findPropName('province')][0] }}
			</form-error>
		</div>
		<div class="grid grid-cols-2 gap-5 lg:gap-10">
			<div class="flex flex-col space-y-1.5 mb-3">
				<label class="tracking-wide text-gray-700 text-sm md:text-base font-bold" for="floor">
					Etage
				</label>
				<input id="floor" v-model="formData[findPropName('floor')]" type="text"
					class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200" />
				<form-error v-if="formData.errors[findPropName('floor')]" :error-source="findPropName('floor')">
					{{ formData.errors[findPropName('floor')][0] }}
				</form-error>
			</div>
			<div class="flex flex-col space-y-1.5 mb-3">
				<label class="tracking-wide text-gray-700 text-sm md:text-base font-bold" for="sq_m">
					Größe m<sup>2</sup> *
				</label>
				<input id="sq_m" v-model="formData[findPropName('sq_m')]" type="text"
					class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200" />
				<form-error v-if="formData.errors[findPropName('sq_m')]" :error-source="findPropName('sq_m')">
					{{ formData.errors[findPropName('sq_m')][0] }}
				</form-error>
			</div>
		</div>
		<div class="flex flex-col space-y-1.5 mb-3">
			<label class="tracking-wide text-gray-700 text-sm md:text-base font-bold" for="elevator">
				Fahrstuhl
			</label>
			<select id="elevator" v-model="formData[findPropName('elevator')]"
				class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200 cursor-pointer">
				<option v-for="(elevatorOption, index) in elevator" :key="index" :value="elevatorOption" selected>
					{{ elevatorOption }}
				</option>
			</select>
			<form-error v-if="formData.errors[findPropName('elevator')]" :error-source="findPropName('elevator')">
				{{ formData.errors[findPropName('elevator')][0] }}
			</form-error>
		</div>
		<div class="md:grid md:grid-cols-2 gap-5 lg:gap-10">
			<div class="flex flex-col space-y-1.5 mb-5">
				<label class="tracking-wide text-gray-700 text-sm sm:text-base font-bold max-sm:mb-1" for="rooms">
					Räume *
				</label>
				<input id="rooms" v-model="formData[findPropName('rooms')]" type="text"
					class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200" />
				<form-error v-if="formData.errors[findPropName('rooms')]" :error-source="findPropName('rooms')">
					{{ formData.errors[findPropName('rooms')][0] }}
				</form-error>
			</div>
			<div class="flex flex-col space-y-1.5 mb-3">
				<label class="tracking-wide text-gray-700 text-sm md:text-base font-bold whitespace-nowrap"
					for="carry_distance">
					Tragestrecke *
				</label>
				<input id="carry_distance" v-model="formData[findPropName('carry_distance')]" type="text"
					class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200" />
				<form-error v-if="formData.errors[findPropName('carry_distance')]"
					:error-source="findPropName('carry_distance')">
					{{ formData.errors[findPropName('carry_distance')][0] }}
				</form-error>
			</div>
		</div>
		<div class="flex flex-col space-y-1.5 mb-3">
			<label class="tracking-wide text-gray-700 text-sm md:text-base font-bold" for="building_type">
				Gebäudeart
			</label>
			<select id="building_type" v-model="formData[findPropName('building_type')]"
				class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200 cursor-pointer">
				<option value="" selected disabled>Auswählen</option>
				<option v-for="(type, index) in buildingTypes" :key="index" :value="type">
					{{ type }}
				</option>
			</select>
			<form-error v-if="formData.errors[findPropName('building_type')]" :error-source="findPropName('building_type')">
				{{ formData.errors[findPropName('building_type')][0] }}
			</form-error>
		</div>
	</div>
</template>