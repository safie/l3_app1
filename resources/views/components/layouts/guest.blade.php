<!DOCTYPE html>
<html class="h-full bg-white" data-theme="winter" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title . ' - ' . config('app.name') : config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="h-full font-sans antialiased">
    {{-- The navbar with `sticky` and `full-width` --}}
   
    {{-- The main content with `full-width` --}}
    <div>
        {{ $slot }}
    </div>
    {{--  TOAST area --}}
    <x-toast />
</body>

</html>
