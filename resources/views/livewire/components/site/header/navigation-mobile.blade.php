<div class="animate__animated animate__{{ $animation }} @if($hidden)hidden @endif absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden z-20">
    <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white dark:bg-slate-800 divide-y-2 divide-gray-50">
        <div class="pt-5 pb-6 px-5">
            <div class="flex items-center justify-between">
                <a class="flex justify-start items-center space-x-2" href="{{ route('home') }}">
                    <span class="sr-only">{{ __('Home') }}</span>
                    <x-icons.logo class="h-8 w-auto" />
                    <p class="text-gray-500 dark:text-gray-100 text-2xl font-semibold">LM</p>
                </a>
                <div class="-mr-2">
                    <button wire:click="closeMenu" type="button" class="bg-white dark:bg-slate-800 text-gray-400 dark:text-gray-100 rounded-md p-2 inline-flex items-center justify-center
                hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-sky-500">
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
                    <x-atoms.mob-nav-link route="{{ route('solutions') }}" icon="beaker">
                        {{ __('Solutions') }}
                    </x-atoms.mob-nav-link>
                    <x-atoms.mob-nav-link route="{{ route('blog') }}" icon="newspaper">
                        {{ __('Blog') }}
                    </x-atoms.mob-nav-link>
                    <x-atoms.mob-nav-link route="{{ route('toolbox') }}" icon="calculator">
                        {{ __('Toolbox') }}
                    </x-atoms.mob-nav-link>
                    <x-atoms.mob-nav-link route="{{ route('story') }}" icon="collection">
                        {{ __('Story') }}
                    </x-atoms.mob-nav-link>
                    <x-atoms.mob-nav-link route="{{ route('contact') }}" icon="phone">
                        {{ __('Contact') }}
                    </x-atoms.mob-nav-link>
                </nav>
            </div>
        </div>

        <div class="py-6 px-5 space-x-4 flex items-center">
            <div class="flex-1">
                @if (Route::has('login'))
                @auth
                <x-atoms.mob-nav-button route="{{ route('dashboard') }}">{{ __('Dashboard') }}</x-atoms.mob-nav-button>
                @else
                <x-atoms.mob-nav-button route="{{ route('login') }}">{{ __('Sign in') }}</x-atoms.mob-nav-button>
                @if (Route::has('register'))
                <x-atoms.mob-nav-button route="{{ route('register') }}">{{ __('Sign up') }}</x-atoms.mob-nav-button>
                @endif
                @endauth
                @endif
            </div>
            <a href="{{ route('theme') }}" class="cursor-pointer">
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
        </div>

    </div>
</div>
