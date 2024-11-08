<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <title>Futsal</title>

    <link rel="stylesheet" href="{{ asset('fontawasom/css/all.css') }}">

</head>

<body>


    @include('member.partials.header')

    @yield('container')

    @include('member.partials.footer')


</body>


</html>
