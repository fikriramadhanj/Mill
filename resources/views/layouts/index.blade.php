<html>
    <head>
        <title>Mill</title>
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        @yield('styles')
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    </head>
    <body>
        @include('layouts.header')
        <div class="container">
            <div class="mt-4">
                <div class="d-flex flex-row flex-nowrap justify-content-between align-items-center">
                    <div class="flex-1">
                        @yield('pageTitle')
                    </div>
                    <div>
                        @yield('pageOptions')
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
        <script src="/js/modernizr-3.5.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script src="/js/main.js"></script>
        @yield('scripts')
        <script src="/pathto/js/sweetalert.js"></script>
        @include('sweet::alert')
    </body>
</html>
