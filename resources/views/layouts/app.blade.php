<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <!-- Scripts -->
    <script>
        window.IPAPP = <?= json_encode([
            'csrfToken' => csrf_token(),
            'user' => auth()->user() ?? null,
            'userId' => auth()->user()->id ?? null,
            'userSolved' => (auth()->user())?auth()->user()->solved->pluck('id')->toArray():null,
            'usesApi' => false,
        ]); ?>
    </script>
    <style>
        @yield('css')
    </style>
    @yield('head-scripts')
</head>
<body>
<div id="ipapp">
    @include('navbar.nav')
    <div class="container content">
        <div class="row">
           @yield('structure')
        </div>
    </div>
</div>
<div id="footer">
    <div id="colorfooter">
    <p>&copy; All right reserved to Smart Ask team.  <a href="https://docs.google.com/document/d/1bLAzkcCbQLpd1Jjb90k1EPG1pWY414T_VeoYR8ajbsM/edit?usp=sharing ">Privacy Policy</a></p>
    </div></div>
<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js" async></script>
@yield('end-scripts','<script src="/js/app.js"></script>')
</body>
</html>
