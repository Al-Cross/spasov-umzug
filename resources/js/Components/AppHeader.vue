<script setup>
import { onMounted, ref } from 'vue';
import { links } from '../../data/header-links.js';

const mobileMenuOpen = ref(false);

onMounted(() => {
	const headerContainer = document.getElementById('header-container');
	const header = document.getElementById('header');
	const slatedEl = document.getElementById('slated');
	const scrollWatcher = document.createElement('div');
	
	scrollWatcher.setAttribute('data-scroll-watcher', '');
	headerContainer.before(scrollWatcher);

	const navObserver = new IntersectionObserver((entries) => {
		header.classList.toggle('bg-yellow-600', !entries[0].isIntersecting);
		slatedEl.classList.toggle('bg-yellow-600', !entries[0].isIntersecting);
		header.classList.toggle('text-yellow-400', entries[0].isIntersecting);
		header.classList.toggle('text-white', !entries[0].isIntersecting);
	}, { rootMargin: "200px 0px 0px 0px"});

	navObserver.observe(scrollWatcher);
});
</script>

<template>
	<div id="header-container" style="background-image: url({{ asset('/storage/images/privat.jpg') }}); @media(max-width: 800px) {height: calc(0.664 * 100vw);} height: calc(0.364 * 100vw);"
		class="lg:bg-center bg-cover sticky top-0">
		<header id="header"
			class="flex justify-between md:p-4 z-50 text-lg text-yellow-400 text-right font-extrabold md:w-3/4 md:m-auto">
			<div id="slated" class="hidden xl:block absolute inset-y-0 left-44 h-16 w-6 transform -skew-x-[8deg]"></div>
			<a href="#" class="block">INSERT LOGO HERE</a>
			<button type="button" class="inline-block xl:hidden w-8 h-8 text-yellow-400 p-1"
				@click="mobileMenuOpen = !mobileMenuOpen">
				<svg class="w-6 h-6" fill="currentColor" stroke="currentColor" viewBox="0 0 24 24"
					xmlns="http://www.w3.org/2000/svg">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
				</svg>
			</button>
			<Transition name="nav">
				<nav v-if="mobileMenuOpen"
					class="absolute flex xl:hidden top-5 md:top-16 left-0 md:left-[12.5%] z-20 mt-2 flex-col bg-yellow-600 w-full md:w-3/4 md:m-auto p-6">
					<a v-for="(anchor, index) in links" :key="index" :href="anchor.url"
						class="hover:bg-yellow-100 px-5 py-1.5 rounded-full"
						:style="{ animation: mobileMenuOpen ? 'fadeIn 0.7s ease-in' : '' }">
						{{ anchor.name }}
					</a>
				</nav>
			</Transition>
			<nav class="hidden xl:grid grid-cols-6 justify-center z-20">
				<div v-for="(anchor, index) in links" :key="index" class="group text-center">
					<div class="bg-black transform scale-x-0 group-hover:scale-x-100 transition-transform origin-center duration-300 h-1"></div>
					<a :href="anchor.url" class="py-1.5 text-sm xl:text-base">
						{{ anchor.name }}
					</a>
				</div>
			</nav>
		</header>
		<!-- <div class="py-52 space-x-11"></div> -->
		<div class="text-center">
			<span class="lg:text-4xl text-3xl font-extrabold tracking-wider uppercase pl-11">
				<slot></slot>
			</span>
		</div>
	</div>
</template>