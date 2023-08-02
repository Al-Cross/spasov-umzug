<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">

        <title>{{ $title ?? 'Spasov Umzug' }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            .bg-secondary {
                background: #f2f2f2 !important;
            }
             .fade-small {
            position: fixed;
            transition: opacity 2s;
            opacity: 1;
        }
        .fade-small.hide {
            opacity: 0;
        }

        body {
            font-family: 'Nunito', sans-serif;
        }
        </style>
    </head>
    <body class="bg-gray-100">
        <div id="app">
            {{ $slot }}
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
    <x-footer></x-footer>
</html>
