<script setup>
import FormError from './FormError';
import { formDataStore } from '../../data/formStore';

let formData = formDataStore;
</script>

<template>
	<div
		class="md:grid md:grid-cols-2 gap-2 gap-x-10 bg-gradient-to-b from-blue-200 to-blue-100 transition duration-500 ease-in rounded-2xl w-full p-6">
		<div class="flex flex-col col-span-2 space-y-1.5">
			<label class="tracking-wide text-gray-700 font-bold mb-2" for="salutation">
				Anrede *
			</label>
			<select id="salutation" v-model="formData.salutation"
				class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200 w-36">
				<option value="" disabled selected>Auswählen</option>
				<option value="Frau">Frau</option>
				<option value="Herr">Herr</option>
			</select>
			<form-error v-if="formData.errors.salutation" :errors="formData.errors">
				{{ formData.errors.salutation[0] }}
			</form-error>
		</div>
		<div class="flex flex-col space-y-1.5">
			<label class="tracking-wide text-gray-700 font-bold mb-2" for="firstName">
				Vorname *
			</label>
			<input id="firstName" v-model="formData.first_name" type="text"
				class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
			<form-error v-if="formData.errors.first_name" :errors="formData.errors">
				{{ formData.errors.first_name[0] }}
			</form-error>
		</div>
		<div class="flex flex-col space-y-1.5">
			<label class="tracking-wide text-gray-700 font-bold mb-2" for="lastName">
				Nachname *
			</label>
			<input id="lastName" v-model="formData.last_name" type="text"
				class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
			<form-error v-if="formData.errors.last_name" :errors="formData.errors">
				{{ formData.errors.last_name[0] }}
			</form-error>
		</div>
		<div class="flex flex-col space-y-1.5">
			<label class="tracking-wide text-gray-700 font-bold mb-2" for="phone">
				Telefonnummer *
			</label>
			<input id="phone" v-model="formData.phone" type="text"
				class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
			<form-error v-if="formData.errors.phone" :errors="formData.errors">
				{{ formData.errors.phone[0] }}
			</form-error>
		</div>
		<div class="flex flex-col space-y-1.5">
			<label class="tracking-wide text-gray-700 font-bold mb-2" for="email">
				Email Adresse *
			</label>
			<input id="email" v-model="formData.email" type="email"
				class="border-0 rounded-2xl shadow-lg hover:border-yellow-200 focus:ring-2 focus:ring-yellow-200">
			<form-error v-if="formData.errors.email" :errors="formData.errors">
				{{ formData.errors.email[0] }}
			</form-error>
		</div>
	</div>
</template>