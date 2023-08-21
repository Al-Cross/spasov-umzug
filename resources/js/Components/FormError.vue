<template>
	<span class="text-red-500 text-xs italic d-block" role="alert">
		<slot></slot>
	</span>
</template>

<script setup>
import { formDataStore } from '../../data/formStore';
import { watch } from 'vue';

const props = defineProps({ errorSource: String });

watch(() => formDataStore[props.errorSource], () => {
	delete formDataStore.errors[props.errorSource];
});
</script>
