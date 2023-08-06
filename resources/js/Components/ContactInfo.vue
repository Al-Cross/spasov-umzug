<script setup>
import FormError from './FormError';
import { formDataStore } from '../../data/formStore';

let formData = formDataStore;
</script>

<template>
	<div
		class="md:grid md:grid-cols-2 gap-2 gap-x-10 bg-gradient-to-b from-blue-200 to-blue-100 transition duration-500 ease-in rounded-2xl w-full p-6">
		<div class="flex flex-col col-span-2 space-y-1.5">
			<label class="tracking-wide text-gray-700 font-bold mb-2" for="anrede">Anrede *</label>
			<select v-model="formData.anrede" name="anrede"
				class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200 w-36">
				<option value="" disabled selected>Auswählen</option>
				<option value="Frau">Frau</option>
				<option value="Herr">Herr</option>
			</select>
			<form-error v-if="formData.errors.anrede" :errors="formData.errors">
				{{ formData.errors.anrede[0] }}
			</form-error>
		</div>
		<div class="flex flex-col space-y-1.5">
			<label class="tracking-wide text-gray-700 font-bold mb-2" for="vorname">
				Vorname *
			</label>
			<input v-model="formData.vorname" type="text" name="vorname"
				class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
			<form-error v-if="formData.errors.vorname" :errors="formData.errors">
				{{ formData.errors.vorname[0] }}
			</form-error>
		</div>
		<div class="flex flex-col space-y-1.5">
			<label class="tracking-wide text-gray-700 font-bold mb-2" for="nachname">
				Nachname *
			</label>
			<input v-model="formData.nachname" type="text" name="nachname"
				class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
			<form-error v-if="formData.errors.nachname" :errors="formData.errors">
				{{ formData.errors.nachname[0] }}
			</form-error>
		</div>
		<div class="flex flex-col space-y-1.5">
			<label class="tracking-wide text-gray-700 font-bold mb-2" for="telefon">
				Telefonnummer *
			</label>
			<input v-model="formData.telefon" type="text" name="telefon"
				class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
			<form-error v-if="formData.errors.telefon" :errors="formData.errors">
				{{ formData.errors.telefon[0] }}
			</form-error>
		</div>
		<div class="flex flex-col space-y-1.5">
			<label class="tracking-wide text-gray-700 font-bold mb-2" for="email">
				Email Adresse *
			</label>
			<input v-model="formData.email" type="email" name="email"
				class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
			<form-error v-if="formData.errors.email" :errors="formData.errors">
				{{ formData.errors.email[0] }}
			</form-error>
		</div>
	</div>
</template>