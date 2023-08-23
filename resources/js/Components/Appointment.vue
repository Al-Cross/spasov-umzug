<script setup>
import FormError from './FormError';
import { formDataStore } from '../../data/formStore';
import { watch } from 'vue';

let formData = formDataStore;

watch(() => formData.date, (newValue) => {
	if (new Date(newValue) < new Date()) {
		formData.errors.date = ['Bitte wählen Sie ein Datum ab morgen.'];
	}
});
</script>

<template>
	<div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-5 gap-x-10 bg-gray-200 w-full p-6">
		<div class="flex flex-col space-y-1.5 mb-3">
			<label class="tracking-wide text-gray-700 text-sm sm:text-base font-bold" for="termin">Termin *</label>
			<input v-model="formData.date" type="date"
				class="border-0 shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200"
				:class="formData.errors.date ? 'border border-red-500' : ''" />
			<form-error v-if="formData.errors.date" error-source="date">
				{{ formData.errors.date[0] }}
			</form-error>
		</div>
		<div class="mb-3">
			<label class="tracking-wide text-gray-700 text-sm sm:text-base font-bold">
				Kostenträger *
			</label>
			<div class="mt-1">
				<input id="self" v-model="formData.cost_bearer" type="radio" value="Selbst" />
				<label class="tracking-wide text-gray-700 text-sm sm:text-base font-bold mb-2 ml-1" for="self">
					Selbst
				</label>
			</div>
			<div>
				<input id="employer" v-model="formData.cost_bearer" type="radio" value="Arbeitgeber" />
				<label class="tracking-wide text-gray-700 text-sm sm:text-base font-bold mb-2 ml-1" for="employer">
					Arbeitgeber
				</label>
			</div>
			<div>
				<input id="UnemploymentAgency" v-model="formData.cost_bearer" type="radio"
					value="Bundesagentur für Arbeit" />
				<label class="tracking-wide text-gray-700 text-sm sm:text-base font-bold mb-2 ml-1"
					for="UnemploymentAgency">
					Bundesagentur für Arbeit
				</label>
			</div>
			<div>
				<input id="army" v-model="formData.cost_bearer" type="radio" value="Bundeswehr" />
				<label class="tracking-wide text-gray-700 text-sm sm:text-base font-bold mb-2 ml-1" for="army">
					Bundeswehr
				</label>
			</div>
			<form-error v-if="formData.errors.cost_bearer" error-source="cost_bearer">
				{{ formData.errors.cost_bearer[0] }}
			</form-error>
		</div>
		<div class="flex flex-col md:col-span-2 lg:col-span-1 space-y-1.5">
			<label class="tracking-wide text-gray-700 text-sm sm:text-base font-bold ml-1" for="remarks">
				Bemerkungen
			</label>
			<textarea id="remarks" v-model="formData.remarks" rows="7"
				class="border-0 shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200"
				:class="formData.errors.remarks ? 'border border-red-500' : ''" />
			<form-error v-if="formData.errors.remarks" error-source="remarks">
				{{ formData.errors.remarks[0] }}
			</form-error>
		</div>
	</div>
</template>