<script setup>
import { services } from '../../data/services';
</script>

<template>
	<div class="grid gap-2 bg-gray-200 w-full p-2 xs:p-6">
		<template v-for="(service, index) in services.type" :key="index">
			<span class="bg-gray-300 font-bold rounded text-sm sm:text-base p-2">{{ service.name }}</span>
			<div v-for="(object, i) in service.objects" :key="i"
				class="grid md:grid-cols-2 font-semibold text-lg m-2">
				<span class="text-sm sm:text-base font-bold">{{ object }}</span>
				<div class="grid grid-cols-2">
					<div>
						<input v-model="services.loadingPoint" type="checkbox" :value="object" />
						<label for="beladestelle" class="text-sm sm:text-base ml-2">Beladestelle</label>
					</div>
					<div>
						<input v-model="services.unloadingPoint" type="checkbox" :value="object" />
						<label for="entladestelle" class="text-sm sm:text-base ml-2">Entladestelle</label>
					</div>
				</div>
			</div>
		</template>
	</div>
</template>