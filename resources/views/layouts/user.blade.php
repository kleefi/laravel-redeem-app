<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body class="bg-[#F9F5EB] max-w-[1200px] mx-auto">
    <x-navbar-user></x-navbar-user>
    <div class="md:py-4 py-0"></div>
    @yield('content')
    <x-footer-user></x-footer-user>
</body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</html>