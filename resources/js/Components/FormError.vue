<template>
	<span class="text-red-500 text-xs italic d-block" role="alert">
		<slot></slot>
	</span>
</template>

<script setup>
defineProps({ errors: Object });
</script>
