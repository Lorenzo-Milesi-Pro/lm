<footer class="bg-white dark:bg-slate-800">
    <div class="max-w-7xl mx-auto py-12 px-4 overflow-hidden sm:px-6 lg:px-8">
        <nav class="-mx-5 -my-2 flex flex-wrap justify-center" aria-label="Footer">
            <div class="px-5 py-2">
                <x-atoms.nav-link route="{{ route('solutions') }}">{{ __('Solutions') }}</x-atoms.nav-link>
            </div>

            <div class="px-5 py-2">
                <x-atoms.nav-link route="{{ route('blog') }}">{{ __('Blog') }}</x-atoms.nav-link>
            </div>

            <div class="px-5 py-2">
                <x-atoms.nav-link route="{{ route('changelog') }}">{{ __('Changelog') }}</x-atoms.nav-link>
            </div>

        </nav>
        <p class="mt-8 text-center text-base text-gray-400">
            {{ config('app.name') }} - {{ Carbon\Carbon::now()->year }}
        </p>
    </div>
</footer>
