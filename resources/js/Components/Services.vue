<script setup>
import { services } from '../../data/services';
</script>

<template>
	<div class="grid gap-2 bg-gradient-to-b from-blue-200 to-blue-100 rounded-2xl w-full p-6">
		<template v-for="(service, index) in services.type" :key="index">
			<span class="bg-blue-300 font-bold rounded p-2">{{ service.name }}</span>
			<div v-for="(object, i) in service.objects" :key="i"
				class="grid lg:grid-cols-2 font-semibold text-lg m-2">
				<span class="font-bold">{{ object }}</span>
				<div class="grid grid-cols-2">
					<div>
						<input v-model="services.beladestelle" type="checkbox" :value="object">
						<label for="beladestelle">Beladestelle</label>
					</div>
					<div>
						<input v-model="services.entladestelle" type="checkbox" :value="object">
						<label for="entladestelle">Entladestelle</label>
					</div>
				</div>
			</div>
		</template>
	</div>
</template>