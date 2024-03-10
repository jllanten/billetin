<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta id="_token" content="{{ csrf_token() }}" />

        <title>Billetin :: Planificador financiero</title>
        <link rel="stylesheet" href="/css/basico.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <script src="/js/utilidades.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="/js/jquery-ui-1.11.4.custom/jquery-ui.min.css">
        <script src="/js/jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
        <script src="/js/jquery-migrate-3.0.0.min.js"></script>

        {{-- https://notifyjs.jpillora.com/ --}}
        <script src="/js/notify.min.js"></script>
        <script src="/js/loadingoverlay.min.js"></script>

        @stack('scripts')

        <script>
            $(document).ajaxStart(function(){
                $.LoadingOverlay("show");
            });
            $(document).ajaxStop(function(){
                $.LoadingOverlay("hide");
            });
        </script>
    </head>

    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
