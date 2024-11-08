<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    @vite('resources/css/app.css')

    <link rel="stylesheet" href="{{ asset('fontawasom/css/all.css') }}">

</head>

<body class=" ">
    <div class="navbar-start md:mx-20 md:my-5">
        <div class="avatar">
            <div class="w-12 rounded-full">
                <img src="{{ asset('img/LOGO.PNG ') }}" class="hidden md:block" />
            </div>
            <a class="btn btn-ghost text-xl text-orange-500 font-bold">Futsal Ball</a>
        </div>
    </div>

    <div class="flex">

        @include('admin.partials.sidebar')

        <!-- conten di sini -->

        @yield('container')

    </div>

</body>


</html>
