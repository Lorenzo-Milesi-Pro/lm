<div class="relative bg-white">
    <div class="mx-auto px-4 sm:px-6">
        <div class="flex justify-between items-center border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">
            <div class="flex justify-start lg:w-0 lg:flex-1">
                <a class="flex justify-start items-center space-x-2" href="{{ route('home') }}">
                    <span class="sr-only">{{ __('Home') }}</span>
                    <x-icons.logo class="h-8 w-auto sm:h-10" />
                    <p class="text-gray-500 text-3xl font-semibold">
                        {{ config('app.name') }}
                    </p>
                </a>
            </div>
            <div class="-mr-2 -my-2 md:hidden">
                <button wire:click="openMenu" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-sky-500" aria-expanded="false"><span class="sr-only">{{ __('Open menu') }}</span>
                    <!-- Heroicon name: outline/menu -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            <nav class="hidden md:flex space-x-10">
                <a href="{{ route('solutions') }}" class="text-base font-medium text-gray-500 hover:text-gray-900">
                    {{ __('Solutions') }}
                </a>
                <a href="{{ route('blog') }}" class="text-base font-medium text-gray-500 hover:text-gray-900">
                    {{ __('Blog') }}
                </a>
                <a href="{{ route('toolbox') }}" class="text-base font-medium text-gray-500 hover:text-gray-900">
                    {{ __('Toolbox') }}
                </a>
                <a href="{{ route('contact') }}" class="text-base font-medium text-gray-500 hover:text-gray-900">
                    {{ __('Contact') }}
                </a>
            </nav>

            <div>
                <label for="search" class="block text-sm font-medium text-gray-700 sr-only">
                    {{ __('Quick Search') }}
                </label>
                <div class="mt-1 relative flex items-center">
                    <input wire:model="search" wire:keydown.enter="go" type="text" name="search" id="search" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full pr-12 sm:text-sm border-gray-300 rounded-md">
                    <div class="absolute inset-y-0 right-0 flex py-1.5 pr-1.5 cursor-pointer" wire:click="go">
                        <span class="inline-flex items-center border border-gray-200 rounded px-2 text-sm font-sans font-medium text-gray-400">
                            <x-icons.search class="w-4 h-4" />
                        </span>
                    </div>
                </div>
            </div>

            <livewire:components.site.header.parts.authentication />
        </div>
        <livewire:components.site.header.navigation-mobile />
    </div>
</div>
