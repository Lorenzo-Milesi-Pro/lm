<nav class="bg-white dark:bg-slate-800 p-4 space-y-3">

    <div class="flex justify-between">
        <a class="flex justify-center items-center space-x-2" href="{{ route('home') }}">
            <span class="sr-only">{{ __('Home') }}</span>
            <x-icons.logo class="h-6 w-auto" />
            <p class="text-gray-500 dark:text-gray-100 text-lg font-semibold">
                {{ config('app.name') }}
            </p>
        </a>

        <a href="{{ route('theme') }}">
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

    <div class="flex justify-between items-center px-3 space-x-3">
        <x-atoms.nav-link route="{{ route('story') }}">{{ __('Story') }}</x-atoms.nav-link>
        <x-atoms.nav-link route="{{ route('blog') }}">{{ __('Blog') }}</x-atoms.nav-link>
        <x-atoms.nav-link route="{{ route('toolbox') }}">{{ __('Toolbox') }}</x-atoms.nav-link>
        <x-atoms.nav-link route="{{ route('contact') }}">{{ __('Contact') }}</x-atoms.nav-link>
        <livewire:components.site.header.parts.authentication />
    </div>

    <div class="px-3 pt-1 md:w-96 md:ml-auto">
        <label for="search" class="sr-only">
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
</nav>

