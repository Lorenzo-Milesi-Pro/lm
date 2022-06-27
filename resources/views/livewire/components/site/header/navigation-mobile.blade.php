<div class="animate__animated animate__{{ $animation }} @if($hidden)hidden @endif absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden z-20">
    <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
        <div class="pt-5 pb-6 px-5">
            <div class="flex items-center justify-between">
                <a class="flex justify-start items-center space-x-2" href="{{ route('home') }}">
                    <span class="sr-only">{{ __('Home') }}</span>
                    <x-icons.logo class="h-8 w-auto" />
                    <p class="text-gray-500 text-3xl font-semibold mt-1">LM</p>
                </a>
                <div class="-mr-2">
                    <button wire:click="closeMenu" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-sky-500">
                        <span class="sr-only">Close menu</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="mt-6">
                <nav class="grid gap-y-8">
                    <a href="{{ route('solutions') }}" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                        <x-icons.beaker class="flex-shrink-0 h-6 w-6 text-sky-600" />
                        <span class="ml-3 text-base font-medium text-gray-900">
                            {{ __('Solutions') }}
                        </span>
                    </a>

                    <a href="{{ route('blog') }}" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                        <x-icons.beaker class="flex-shrink-0 h-6 w-6 text-sky-600" />
                        <span class="ml-3 text-base font-medium text-gray-900">
                            {{ __('Blog') }}
                        </span>
                    </a>

                    <a href="{{ route('toolbox') }}" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                        <x-icons.archive class="flex-shrink-0 h-6 w-6 text-sky-600" />
                        <span class="ml-3 text-base font-medium text-gray-900">
                            {{ __('Toolbox') }}
                        </span>
                    </a>

                    <a href="{{ route('contact') }}" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                        <x-icons.phone class="flex-shrink-0 h-6 w-6 text-sky-600" />
                        <span class="ml-3 text-base font-medium text-gray-900">
                            {{ __('Contact') }}
                        </span>
                    </a>

                </nav>
            </div>
        </div>
        <div class="py-6 px-5 space-y-6">
            <div>
                @if (Route::has('login'))
                @auth
                <a href="{{ route('dashboard') }}" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md text-base font-medium text-gray-900 hover:bg-gray-100">
                    {{ __('Dashboard') }}
                </a>
                @else
                <a href="{{ route('login') }}" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md text-base font-medium text-gray-900 hover:bg-gray-100">
                    {{ __('Sign in') }}
                </a>
                @if (Route::has('register'))
                <a href="#" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-sky-600 hover:bg-sky-700">
                    Sign up
                </a>
                @endif
                @endauth
                @endif
            </div>
        </div>
    </div>
</div>
