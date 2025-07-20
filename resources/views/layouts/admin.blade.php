<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-navbar-admin></x-navbar-admin>
    <x-sidebar-admin></x-sidebar-admin>
    <div class="p-8 mt-16 sm:ml-64">
        <x-breadcrumbs></x-breadcrumbs>
        @yield('content')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</html>