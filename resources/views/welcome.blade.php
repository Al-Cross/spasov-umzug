<x-layout>
    <app-header>Make your next move</app-header>

    <!-- Motto -->
    <div class="lg:py-48 lg:p-24 bg-gradient-to-b from-gray-300 to-gray-100 p-10 py-11">
         <div class="lg:grid lg:grid-cols-11 mb-7">
            <div class="lg:col-span-3 text-center lg:text-left">
                <i class="fas fa-people-carry fa-4x fill-current text-yellow-400 lg:border-4 lg:border-yellow-400 lg:p-10 lg:rounded-full lg:ml-24 mt-5"></i>
                <div  class="font-extrabold text-center lg:text-2xl mt-7 hover-scale">
                    Sorgfältige Planung und Beladung
                </div>
            </div>
            {{-- <div class="border-b-4 w-1/4 border-yellow-400"></div> --}}
            <div class="hidden lg:block">
                <i class="fas fa-arrow-alt-circle-right fa-2x fill-current text-yellow-400 lg:mt-20 lg:pl-10 mt-10"></i>
            </div>
            <div class="lg:col-span-3 text-center lg:text-left">
                <i class="fas fa-truck fa-4x fill-current text-yellow-400 lg:border-4 lg:border-yellow-400 lg:p-10 lg:ml-28 lg:rounded-full mt-5"></i>
                 <div class="font-extrabold text-center lg:text-2xl mt-7 hover-scale">
                    Transport in ganz Deutschland und allen Nachbarländern
                </div>
            </div>
            <div class="hidden lg:block">
                <i class="fas fa-arrow-alt-circle-right fa-2x fill-current text-yellow-400 lg:mt-20 lg:pl-10 mt-10"></i>
            </div>
            <div class="lg:col-span-3 text-center lg:text-left">
                <i class="fas fa-box-open fa-4x fill-current text-yellow-400 lg:border-4 lg:border-yellow-400 lg:p-10 lg:ml-14 lg:rounded-full mt-5"></i>
                <div class="font-extrabold lg:text-2xl hover-scale mt-7">
                    Entladung und Montagen
                </div>
            </div>
        </div>
    </div> <!-- End Motto -->
    <div class="container mx-auto bg-gradient-to-b from-gray-100 to-white lg:px-32 px-10 pb-16">
        <!-- Services -->
        <div class="grid lg:grid-cols-3 grid-cols-1 gap-4 pb-12">
            <div class="bg-gray-100 rounded shadow-lg">
                <a href="/services">
                    <img src="{{ asset('/storage/images/privat.jpg') }}" class="rounded" alt="privat">
                </a>
                <div class="p-4">
                    <span class="font-extrabold text-lg">Privatumzüge</span>
                    <div class="border-bottom"></div>
                    <p class="text-base mt-5 mb-10">
                        Jeder Umzug wird individuell nach Ihren Wünschen und Bedürfnissen geplant. Ihr Umzugsgut ist bei uns in guten Händen.
                    </p>
                    <a href="/services" class="border-b-4 border-yellow-400 mt-5 transition duration-500 ease-in-out transform-gpu hover:bg-yellow-200 hover:-translate-x-1 hover:scale-110 px-2 py-1 rounded">Mehr erfahren</a>
                </div>
            </div>
            <div class="bg-gray-100 rounded shadow-lg">
                <a href="/services#office">
                    <img src="{{ asset('/storage/images/business.jpg') }}" class="rounded" alt="office">
                </a>
                <div class="p-4">
                    <span class="font-extrabold text-lg">Firmen- und Büroumzüge</span>
                    <div class="border-bottom"></div>
                    <p class="text-base mt-5 mb-10">
                        Jeder Umzug wird individuell nach Ihren Wünschen und Bedürfnissen geplant. Ihr Umzugsgut ist bei uns in guten Händen.
                    </p>
                    <a href="/services#office" class="border-b-4 border-yellow-400 mt-5 transition duration-500 ease-in-out transform-gpu hover:bg-yellow-200 hover:-translate-x-1 hover:scale-110 px-2 py-1 rounded">Mehr erfahren</a>
                </div>
            </div>
            <div class="bg-gray-100 rounded shadow-lg">
                <a href="/services#transport">
                    <img src="{{ asset('/storage/images/small-umzug.jpg') }}" class="rounded" alt="transport">
                </a>
                <div class="p-4">
                    <span class="font-extrabold text-lg">Transport und Beiladung</span>
                    <div class="border-bottom"></div>
                    <p class="text-base mt-5 mb-10">
                        Jeder Umzug wird individuell nach Ihren Wünschen und Bedürfnissen geplant. Ihr Umzugsgut ist bei uns in guten Händen.
                    </p>
                    <a href="/services#transport" class="border-b-4 border-yellow-400 mt-5 transition duration-500 ease-in-out transform-gpu hover:bg-yellow-200 hover:-translate-x-1 hover:scale-110 px-2 py-1 rounded">Mehr erfahren</a>
                </div>
            </div>
        </div>
    </div> <!-- End Container -->
     <div class="bg-white">
        <div class="font-extrabold text-6xl text-center">Kunden, die uns vertrauen</div>
        <div class="border-b-4 border-yellow-400"></div>
        <div class="grid lg:grid-cols-3 gap-10 lg:gap-3 lg:py-36 lg:pl-24 pl-10 mb-16 lg:mb-7">
            <img src="{{ asset('/storage/images/Logo_Germersheim.jpg') }}" alt="Logo_Germersheim" class="hover-scale lg:mb-5 mt-10 lg:mt-0 pl-16 lg:pl-0">
            <img src="{{ asset('/storage/images/logo_coneon.jpg') }}" alt="logo_coneon" class="hover-scale">
            <img src="{{ asset('/storage/images/cleanka.jpg') }}" alt="cleanka" class="hover-scale">
            <img src="{{ asset('/storage/images/woerth_am_rhein.jpg') }}" alt="woerth_am_rhein" class="hover-scale pl-16 lg:pl-0">
            <img src="{{ asset('/storage/images/bettenritter.png') }}" alt="bettenritter" class="lg:mt-10 hover-scale pl-16 lg:pl-0">
            <img src="{{ asset('/storage/images/zapf.jpg') }}" alt="zapf" class="lg:mt-5 hover-scale pl-10 lg:pl-0">
            <div></div>
            <img src="{{ asset('/storage/images/schuster.jpg') }}" alt="schuster" class="lg:mt-10 hover-scale pl-14 lg:pl-0">
        </div>
        <div class="font-extrabold text-6xl text-center">Ausgezeichnet von</div>
        <div class="border-b-4 border-yellow-400"></div>
        <div class="flex justify-around mt-10 pb-12">
            <img src="{{ asset('/storage/images/check24.svg') }}" alt="check24" class="hover-scale">
        </div>
    </div>
    <div>
        <div>
            <a href="#top" class="hide text-white bg-yellow-700 font-extrabold hover:-translate-y-0.5 transform inline-block transition px-5 py-1 rounded-full fade-small bottom-20 right-10 active:bg-yellow-800 hover:bg-yellow-600">
                <i class="fas fa-arrow-up fa-2x"></i>
            </a>
        </div>
    </div>
</x-layout>

 <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
 <script>
   (function() {
      var timeout;
      var $window = $(window);
      var $fade = $('.fade-header');

      $window.on('scroll', function(e){
        clearTimeout(timeout);

        timeout = setTimeout(function() {
            var scrollBottom = $(document).height() - $(window).height() - $(window).scrollTop();
            console.log(scrollBottom);
          if (scrollBottom > 1800) {
            $fade.removeClass('bg-black transition ease-in duration-700');
          } else {
            $fade.addClass('bg-black transition ease-in duration-700');
          }
        }, 100);
      });
    }());
</script>
