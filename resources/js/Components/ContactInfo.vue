<script setup>
import FormError from './FormError';
import { formDataStore } from '../../data/formStore';

let formData = formDataStore;
</script>

<template>
	<div
		class="grid grid-cols-1 sm:grid-cols-2 gap-2 gap-x-10 bg-gray-200 w-full p-6">
		<div class="flex flex-col sm:col-span-2 space-y-1.5 mb-3">
			<label class="tracking-wide text-gray-700 text-sm sm:text-base font-bold" for="salutation">
				Anrede *
			</label>
			<select id="salutation" v-model="formData.salutation"
				class="shadow-lg focus:ring-2 focus:ring-yellow-200 w-36"
				:class="formData.errors.salutation ? 'border border-red-500' : 'border-0'">
				<option value="" disabled selected>Auswählen</option>
				<option value="Frau">Frau</option>
				<option value="Herr">Herr</option>
			</select>
			<form-error v-if="formData.errors.salutation" error-source="salutation">
				{{ formData.errors.salutation[0] }}
			</form-error>
		</div>
		<div class="flex flex-col space-y-1.5 mb-3">
			<label class="tracking-wide text-gray-700 text-sm sm:text-base font-bold" for="firstName">
				Vorname *
			</label>
			<input id="firstName" v-model="formData.first_name" type="text"
				class="shadow-lg focus:ring-2 focus:ring-yellow-200"
				:class="formData.errors.first_name ? 'border-1 border-red-500' : 'border-0'" />
			<form-error v-if="formData.errors.first_name" error-source="first_name">
				{{ formData.errors.first_name[0] }}
			</form-error>
		</div>
		<div class="flex flex-col space-y-1.5 mb-3">
			<label class="tracking-wide text-gray-700 text-sm sm:text-base font-bold" for="lastName">
				Nachname *
			</label>
			<input id="lastName" v-model="formData.last_name" type="text"
				class="shadow-lg focus:ring-2 focus:ring-yellow-200"
				:class="formData.errors.last_name ? 'border border-red-500' : 'border-0'" />
			<form-error v-if="formData.errors.last_name" error-source="last_name">
				{{ formData.errors.last_name[0] }}
			</form-error>
		</div>
		<div class="flex flex-col space-y-1.5 mb-3">
			<label class="tracking-wide text-gray-700 text-sm sm:text-base font-bold" for="phone">
				Telefonnummer *
			</label>
			<input id="phone" v-model="formData.phone" type="text"
				class="shadow-lg focus:ring-2 focus:ring-yellow-200"
				:class="formData.errors.phone ? 'border border-red-500' : 'border-0'" />
			<form-error v-if="formData.errors.phone" error-source="phone">
				{{ formData.errors.phone[0] }}
			</form-error>
		</div>
		<div class="flex flex-col space-y-1.5 mb-3">
			<label class="tracking-wide text-gray-700 text-sm sm:text-base font-bold" for="email">
				Email Adresse *
			</label>
			<input id="email" v-model="formData.email" type="email"
				class="shadow-lg focus:ring-2 focus:ring-yellow-200"
				:class="formData.errors.email ? 'border border-red-500' : 'border-0'" />
			<form-error v-if="formData.errors.email" error-source="email">
				{{ formData.errors.email[0] }}
			</form-error>
		</div>
	</div>
</template>