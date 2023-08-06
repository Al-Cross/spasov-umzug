<script setup>
import FormError from './FormError';
import { formDataStore } from '../../data/formStore';

let formData = formDataStore;
</script>

<template>
	<div class="grid grid-cols-1 md:grid-cols-2 gap-5 gap-x-10 bg-gradient-to-b from-blue-200 to-blue-100 rounded-2xl w-full p-6">
		<div class="flex flex-col space-y-1.5">
			<label class="tracking-wide text-gray-700 font-bold mb-2" for="termin">Termin *</label>
			<input v-model="formData.date" type="date" name="date"
				class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
			<form-error v-if="formData.errors.date" :errors="formData.errors">
				{{ formData.errors.date[0] }}
			</form-error>
		</div>
		<div>
			<label class="tracking-wide text-gray-700 font-bold mb-2" for="kostentraeger">
				Kostenträger *
			</label>
			<div>
				<input v-model="formData.kostentraeger" type="radio" value="Selbst">
				<label class="tracking-wide text-gray-700 font-bold mb-2 ml-1" for="selbst">
					Selbst
				</label>
			</div>
			<div>
				<input v-model="formData.kostentraeger" type="radio" value="Arbeitgeber">
				<label class="tracking-wide text-gray-700 font-bold mb-2 ml-1" for="Arbeitgeber">
					Arbeitgeber
				</label>
			</div>
			<div>
				<input v-model="formData.kostentraeger" type="radio" value="Bundesagentur für Arbeit">
				<label class="tracking-wide text-gray-700 font-bold mb-2 ml-1" for="Bundesagentur">
					Bundesagentur für Arbeit
				</label>
			</div>
			<div>
				<input v-model="formData.kostentraeger" type="radio" value="Bundeswehr">
				<label class="tracking-wide text-gray-700 font-bold mb-2 ml-1" for="Bundeswehr">
					Bundeswehr
				</label>
			</div>
			<form-error v-if="formData.errors.kostentraeger" :errors="formData.errors">
				{{ formData.errors.kostentraeger[0] }}
			</form-error>
		</div>
		<div class="flex flex-col md:col-span-2 lg:col-span-1 space-y-1.5">
			<label class="tracking-wide text-gray-700 font-bold mb-2 ml-1" for="bemerkungen">
				Bemerkungen
			</label>
			<textarea v-model="formData.bemerkungen" rows="7"
				class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200" />
			<form-error v-if="formData.errors.bemerkungen" :errors="formData.errors">
				{{ formData.errors.bemerkungen[0] }}
			</form-error>
		</div>
	</div>
</template>