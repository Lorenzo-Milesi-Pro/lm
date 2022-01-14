<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased flex">
        <x-jet-banner />

        <!-- Page Sidebar -->
            <div class="flex flex-col min-h-0 bg-gray-800 w-72">
                <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                    <div class="flex items-center flex-shrink-0 px-4 space-x-2">
                        <x-icons.logo class="h-8 w-auto" />
                        <p class="text-white text-xl font-semibold">
                            {{ config('app.name') }}
                        </p>
                    </div>
                    <nav class="mt-5 flex-1 px-2 bg-gray-800 space-y-1" aria-label="Sidebar">
                        <x-link href="{{ route('dashboard') }}"
                                :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-link>
                        <div class="h-px bg-gray-500"></div>
                        <p class="text-gray-300 group flex items-center px-2 py-2 text-sm font-bold rounded-md">
                            {{ __('Blog') }}
                        </p>
                        <x-link href="{{ route('dashboard.blog') }}"
                                :active="request()->routeIs('dashboard.blog')">
                            {{ __('Posts') }}
                        </x-link>
                        <x-link href="{{ route('dashboard.blog') }}"
                                :active="request()->routeIs('dashboard.blog.domains')">
                            {{ __('Domains') }}
                        </x-link>
                        <div class="h-px bg-gray-500"></div>
                    </nav>
                </div>
            </div>

        <div class="min-h-screen bg-gray-100 flex-1">
            <livewire:navigation-menu />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
        @endif

        <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
