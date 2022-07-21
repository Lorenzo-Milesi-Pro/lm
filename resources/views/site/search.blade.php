<x-guest-layout>
    <div class="relative bg-gray-50 dark:bg-slate-900 pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 dark:text-slate-100 sm:text-4xl">
                    Recherche
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 dark:text-slate-300 sm:mt-4">
                    Voici les résultats pour : "{{ request()->get('search') }}"
                </p>
            </div>

            <div class="max-w-7xl mx-auto py-4 px-4 sm:py-8 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h3 class="mt-1 text-3xl font-extrabold text-gray-900 dark:text-slate-100 sm:tracking-tight">
                        {{ __('Articles') }}
                    </h3>
                </div>
            </div>

            <livewire:components.site.search.matching-posts :search="request()->get('search')" />

        </div>
    </div>
</x-guest-layout>
