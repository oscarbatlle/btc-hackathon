<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Bitastic - Friendly Affiliate with Bitcoin')</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">


</head>
<body>
    @yield('content')
    <script src="{{{ secure_asset('/js/vendor.js') }}}"></script>
    <script src="{{{ secure_asset('/js/main.js') }}}"></script>
    @yield('specialjs')

</body>
</html>
