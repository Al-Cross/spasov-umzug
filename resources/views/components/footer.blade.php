<div class="lg:grid lg:grid-cols-3 lg:place-content-center sm:h-80 bg-blue-900 p-10">
	<div class="sm:text-2xl text-xl text-blue-200 font-mono font-semibold mb-7">
		<div>
			<i class="fas fa-map-marker-alt fa-2x fill-current text-blue-200"></i> Anschrift:
		</div>
		<div class="mt-5">
			Zähringerstrasse 74<br>
			76133 Karslruhe
		</div>
	</div>
	<div  class="sm:text-2xl text-xl text-blue-200 font-mono font-semibold mb-7">
		<div class="mb-4">
			<i class="fas fa-id-card fa-2x  fill-current text-blue-200"></i> Kontakt:
		</div>
		<div>
			Tel: 0721 - 15 65 48 51<br>
			Mobil: 0163 - 143 65 40<br>
			Email: info@spasov-umzuege.de
			<a href="https://www.facebook.com/spasovumzuege?ref=aymt_homepage_panel"><br>
				<i class="fab fa-facebook-square fa-2x fill-current text-blue-200"></i> Besuchen Sie Uns
			</a>
		</div>
	</div>
	<div  class="sm:text-2xl text-xl text-blue-200 font-mono font-semibold mb-7">
		<div class="sm:mb-10 mb-5">
			<i class="fas fa-project-diagram fa-2x fill-current text-blue-200"></i> Referenzen:
		</div>
		<div class="space-y-3.5">
			<div><a href="https://www.my-hammer.de/firma/spasov-umzuege-karlsruhe/" target="_blank" rel="noopener">MyHammer</a></div>
			<div><a href="#"><strong>Impressum / Datenschutz</strong></a></div>
		</div>
	</div>
</div>
<div class="bg-blue-900 text-center text-blue-200">
	<span>&#169; {{ date('Y')}}</span>
	<a href="https://spasov-umzuege.de" title="Spasov Umzüge">spasov-umzuege.de | Umzugsunternehmen Karlsruhe</a>
</div>

<div>
    <a href="#top" class="hide text-white bg-yellow-700 font-extrabold hover:-translate-y-0.5 transform inline-block transition px-5 py-1 rounded-full fade-small bottom-20 right-10 active:bg-yellow-800 hover:bg-yellow-600">
        <i class="fas fa-arrow-up fa-2x"></i>
    </a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
 <script>
   (function() {
      var timeout;
      var $window = $(window);
      var $fade = $('.fade-small');

      $window.on('scroll', function(e){
        clearTimeout(timeout);

        timeout = setTimeout(function() {
		      var scrollBottom = $(document).height() - $(window).height() - $(window).scrollTop();

          if (scrollBottom < 1050) {
            $fade.removeClass('hide');
          } else {
            $fade.addClass('hide');
          }
        }, 100);
      });
    }());
</script>
