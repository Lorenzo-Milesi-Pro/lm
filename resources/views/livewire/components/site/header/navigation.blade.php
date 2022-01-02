<div class="relative bg-white">
    <div class="mx-auto px-4 sm:px-6">
        <div class="flex justify-between items-center border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">
            <div class="flex justify-start lg:w-0 lg:flex-1">
                <a class="flex justify-start items-center space-x-2" href="{{ route('home') }}">
                    <span class="sr-only">{{ __('Home') }}</span>
                    <x-icons.logo class="h-8 w-auto sm:h-10" />
                    <p class="text-gray-500 text-3xl font-semibold mt-1">LM</p>
                </a>
            </div>
            <div class="-mr-2 -my-2 md:hidden">
                <button wire:click="openMenu" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false"><span class="sr-only">{{ __('Open menu') }}</span>
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
                <a href="{{ route('contact') }}" class="text-base font-medium text-gray-500 hover:text-gray-900">
                    {{ __('Contact') }}
                </a>
                <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">
                    {{ __('Shop') }}
                </a>
            </nav>
            <livewire:components.site.header.parts.authentication />
        </div>
        <livewire:components.site.header.navigation-mobile />
    </div>
</div>
