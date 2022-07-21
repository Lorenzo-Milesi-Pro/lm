@if($posts->count())
<div class="relative bg-gray-50 dark:bg-slate-900 pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
    <div class="absolute inset-0">
        <div class="bg-white dark:bg-slate-800 h-1/3 sm:h-2/3"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 dark:text-slate-100 sm:text-4xl">
                Derniers articles
            </h2>
            <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 dark:text-slate-300 sm:mt-4">
                Si vous en voulez plus, <a href="{{ route('blog') }}" class="text-sky-500 hover:text-sky-700 dark:text-sky-400 dar:hover:text-sky-600 hover:underline">c'est par ici</a>
            </p>
        </div>
        <div class="mt-12 max-w-lg mx-auto grid gap-8 lg:grid-cols-3 lg:max-w-none">
            @foreach($posts as $post)
                <x-models.post-card :post="$post" />
            @endforeach
        </div>
    </div>
</div>
@endif
