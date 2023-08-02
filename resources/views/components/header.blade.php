<div style="background-image: url({{ asset('/storage/images/privat.jpg') }}); @media(max-width: 800px) {height: calc(0.664 * 100vw);} height: calc(0.364 * 100vw);" class="lg:bg-center bg-cover">
         <header class="flex justify-between lg:fixed w-full lg:bg-white md:space-x-4 md:p-10 md:z-50 text-lg text-yellow-400 md:z-50 text-right font-extrabold uppercase">
            <a href="#" class="block">INSERT LOGO HERE</a>
            <button type="button" @click="mobileMenuOpen = !mobileMenuOpen" class="inline-block md:hidden w-8 h-8 bg-yellow-200 text-yellow-400 p-1">
                <svg class="w-6 h-6" fill="currentColor" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
            <nav
                :class="{ 'flex' : mobileMenuOpen, 'hidden' : !mobileMenuOpen }"
                @click.away="mobileMenuOpen = false"
                class="absolute md:block md:relative top-16 left-0 md:top-0 z-20 mt-2 md:mt-0 flex-col md:flex-row md:space-x-6 w-full md:w-auto md:bg-transparent p-6 md:p-0">
                <a href="/" class="hover:bg-yellow-100 px-5 py-1.5 rounded-full">Home</a>
                <a href="/services" class="bg-yellow-100 px-5 py-1.5 rounded-full">Leistungen</a>
                <a href="/facility" class="hover:bg-yellow-100 px-5 py-1.5 rounded-full">Facility Service</a>
                <a href="/referals" class="hover:bg-yellow-100 px-5 py-1.5 rounded-full">Referenzen</a>
                <a href="/calculator" class="hover:bg-yellow-100 px-5 py-1.5 rounded-full">Umzugsanfrage</a>
                <a href="#" class="hover:bg-yellow-100 px-5 py-1.5 rounded-full">AGB</a>
                <a href="#" class="hover:bg-yellow-100 px-5 py-1.5 rounded-full">Kontakt</a>
            </nav>
        </header>
    <div class="py-52 space-x-11"></div>
    <div class="text-center">
        <span class="lg:text-4xl text-3xl font-extrabold tracking-wider uppercase pl-11">{{ $slot }}</span>
    </div>
</div>
