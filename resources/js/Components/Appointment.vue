<script setup>
import FormError from './FormError';
import { formDataStore } from '../../data/formStore';

let formData = formDataStore;
</script>

<template>
	<div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-5 gap-x-10 bg-gradient-to-b from-blue-200 to-blue-100 rounded-2xl w-full p-6">
		<div class="flex flex-col space-y-1.5 mb-3">
			<label class="tracking-wide text-gray-700 font-bold" for="termin">Termin *</label>
			<input v-model="formData.date" type="date"
				class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
			<form-error v-if="formData.errors.date" :errors="formData.errors">
				{{ formData.errors.date[0] }}
			</form-error>
		</div>
		<div class="mb-3">
			<label class="tracking-wide text-gray-700 font-bold">
				Kostenträger *
			</label>
			<div class="mt-1">
				<input id="self" v-model="formData.cost_bearer" type="radio" value="Selbst">
				<label class="tracking-wide text-gray-700 font-bold mb-2 ml-1" for="self">
					Selbst
				</label>
			</div>
			<div>
				<input id="employer" v-model="formData.cost_bearer" type="radio" value="Arbeitgeber">
				<label class="tracking-wide text-gray-700 font-bold mb-2 ml-1" for="employer">
					Arbeitgeber
				</label>
			</div>
			<div>
				<input id="UnemploymentAgency" v-model="formData.cost_bearer" type="radio"
					value="Bundesagentur für Arbeit">
				<label class="tracking-wide text-gray-700 font-bold mb-2 ml-1"
					for="UnemploymentAgency">
					Bundesagentur für Arbeit
				</label>
			</div>
			<div>
				<input id="army" v-model="formData.cost_bearer" type="radio" value="Bundeswehr">
				<label class="tracking-wide text-gray-700 font-bold mb-2 ml-1" for="army">
					Bundeswehr
				</label>
			</div>
			<form-error v-if="formData.errors.cost_bearer" :errors="formData.errors">
				{{ formData.errors.cost_bearer[0] }}
			</form-error>
		</div>
		<div class="flex flex-col md:col-span-2 lg:col-span-1 space-y-1.5 mb-3">
			<label class="tracking-wide text-gray-700 font-bold ml-1" for="remarks">
				Bemerkungen
			</label>
			<textarea id="remarks" v-model="formData.remarks" rows="7"
				class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200" />
			<form-error v-if="formData.errors.remarks" :errors="formData.errors">
				{{ formData.errors.remarks[0] }}
			</form-error>
		</div>
	</div>
</template>