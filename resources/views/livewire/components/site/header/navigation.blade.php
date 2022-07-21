<div class="relative bg-white dark:bg-slate-800">
    <div class="mx-auto px-4 sm:px-6">
        <div class="flex justify-between items-center border-b-2 border-gray-100 dark:border-rose-500 py-6 md:justify-start md:space-x-10">
            <div class="flex justify-start lg:w-0 lg:flex-1">
                <a class="flex justify-start items-center space-x-2" href="{{ route('home') }}">
                    <span class="sr-only">{{ __('Home') }}</span>
                    <x-icons.logo class="h-8 w-auto sm:h-10" />
                    <p class="text-gray-500 dark:text-gray-100 text-3xl font-semibold">
                        {{ config('app.name') }}
                    </p>
                </a>
            </div>
            <div class="-mr-2 -my-2 md:hidden">
                <button wire:click="openMenu" type="button" class="bg-white dark:bg-slate-800 text-gray-400 dark:text-gray-100 rounded-md p-2 inline-flex items-center justify-center
                hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-sky-500" aria-expanded="false">
                    <span class="sr-only">{{ __('Open menu') }}</span>
                    <!-- Heroicon name: outline/menu -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <nav class="hidden md:flex space-x-10">
                <x-atoms.nav-link route="{{ route('solutions') }}">{{ __('Solutions') }}</x-atoms.nav-link>
                <x-atoms.nav-link route="{{ route('blog') }}">{{ __('Blog') }}</x-atoms.nav-link>
                <x-atoms.nav-link route="{{ route('toolbox') }}">{{ __('Toolbox') }}</x-atoms.nav-link>
                <x-atoms.nav-link route="{{ route('story') }}">{{ __('Story') }}</x-atoms.nav-link>
                <x-atoms.nav-link route="{{ route('contact') }}">{{ __('Contact') }}</x-atoms.nav-link>
            </nav>

            <div class="hidden lg:block">
                <label for="search" class="block text-sm font-medium text-gray-700 sr-only">
                    {{ __('Quick Search') }}
                </label>
                <div class="mt-1 relative flex items-center">
                    <input wire:model="search" wire:keydown.enter="go" type="text" name="search" id="search" class="shadow-sm  focus:ring-indigo-500 focus:border-indigo-500 dark:focus:ring-rose-500 dark:focus:border-rose-500 dark:bg-slate-800 block w-full pr-12 sm:text-sm border-gray-300 dark:border-gray-400 rounded-md dark:text-white">
                    <div class="absolute inset-y-0 right-0 flex py-1.5 pr-1.5 cursor-pointer" wire:click="go">
                        <span class="inline-flex items-center border border-gray-200 dark:border-gray-500 rounded px-2 text-sm font-sans font-medium text-gray-400">
                            <x-icons.search class="w-4 h-4 dark:text-gray-300" />
                        </span>
                    </div>
                </div>
            </div>

            <a href="{{ route('theme') }}" class="hidden md:block cursor-pointer">
                @if('dark' === $theme)
                    <div class="hover:bg-slate-700 text-slate-200 hover:text-amber-500 p-2 rounded-full transition ease-in-out delay-75 duration-200">
                        <x-icons.sun class="h-6 w-6" />
                    </div>
                @else 
                    <div class="hover:bg-slate-100 text-slate-500 hover:text-cyan-500 p-2 rounded-full transition ease-in-out delay-75 duration-200">
                        <x-icons.moon class="h-6 w-6" />
                    </div>
                @endif
            </a>

            <livewire:components.site.header.parts.authentication />
        </div>
        <livewire:components.site.header.navigation-mobile />
    </div>
</div>
