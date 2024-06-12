<!DOCTYPE html>
<html data-theme="lofi" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title . ' - ' . config('app.name') : config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">

    {{-- NAVBAR mobile only --}}
    <x-nav class="lg:hidden" sticky>
        <x-slot:brand>
            <x-app-brand />
        </x-slot:brand>
        <x-slot:actions>
            <label class="mr-3 lg:hidden" for="main-drawer">
                <x-icon class="cursor-pointer" name="o-bars-3" />
            </label>
        </x-slot:actions>
    </x-nav>

    {{-- MAIN --}}
    <x-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar class="bg-base-100 lg:bg-inherit" drawer="main-drawer" collapsible>

            {{-- BRAND --}}
            <x-app-brand class="p-5 pt-3" />

            {{-- MENU --}}
            <x-menu activate-by-route>

                {{-- User --}}
                @if ($user = auth()->user())
                    <x-menu-separator />

                    <x-list-item class="-mx-2 !-my-2 rounded" value="name" :item="$user" sub-value="email"
                        no-separator no-hover>
                        <x-slot:actions>
                            <x-button class="btn-circle btn-ghost btn-xs" icon="o-power" tooltip-left="logoff"
                                no-wire-navigate link="/logout" />
                        </x-slot:actions>
                    </x-list-item>

                    <x-menu-separator />
                @endif

                <x-menu-item title="Hello" icon="o-sparkles" link="/" />
                <x-menu-sub title="Tetapan" icon="o-cog-6-tooth">
                    <x-menu-item title="Isu" icon="o-wifi" link="####" />
                    <x-menu-item title="Post" icon="o-archive-box" link="/posts" />
                </x-menu-sub>
            </x-menu>
        </x-slot:sidebar>

        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-main>

    {{--  TOAST area --}}
    <x-toast />
    @livewireScripts
</body>

</html>
