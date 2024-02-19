<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


        <!-- Inject Data -->
        @if(!is_null(Auth::user()))
            <script>
                window.PteroLinkUser = {!! json_encode(Auth::user()->toReactObject()) !!};
            </script>
        @endif

         @if(!empty($siteConfiguration))
            <script>
                window.SiteConfiguration = {!! json_encode($siteConfiguration) !!};
            </script>
        @endif

        @viteReactRefresh
        @vite('resources/scripts/app.jsx')

    </head>
    <body class="antialiased">
        <div id="root"></div>
    </body>
</html>
