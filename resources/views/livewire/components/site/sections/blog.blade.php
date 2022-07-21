    <div class="relative bg-gray-50 dark:bg-slate-900 pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 dark:text-slate-100 sm:text-4xl">
                    Le Blog
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 dark:text-slate-300 sm:mt-4">
                    Ici, c'est le coin où je peux m'exprimer sur mon travail, échanger sur mes retours d'expérience
                    ou encore apporter des réflexions ouvertes sur le développement et autres sujets divers
                </p>
            </div>

            <div class="mt-8">
                <div class="block">
                    <div class="border-b border-gray-200">
                        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                            <a href="{{ route('blog') }}"
                               class="@if(!$d) border-indigo-500 text-indigo-600 dark:border-yellow-500 dark:text-yellow-600 whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm dark:text-base @else border-transparent text-gray-500 dark:text-slate-300 hover:text-gray-700 hover:border-gray-200 whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm dark:text-base @endif">
                                {{ __('Toustes') }}

                                <span class="@if(!$d) bg-indigo-100 text-indigo-600 dark:bg-yellow-100 dark:text-yellow-600 @else bg-gray-100 text-gray-900 @endif hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block">{{ $postsCount }}</span>
                            </a>
                            @foreach($domains as $domain)
                                @if($domain->published_posts->count())
                                <a href="{{ route('blog', ['d' => $domain->slug]) }}"
                                   class="@if($domain->slug === $d) border-indigo-500 text-indigo-600 dark:border-yellow-500 dark:text-yellow-600 whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm dark:text-base @else border-transparent text-gray-500 dark:text-slate-300 hover:text-gray-700 hover:border-gray-200 whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm dark:text-base @endif">
                                    {{ $domain->name }}

                                    <span class="@if($domain->slug === $d) bg-indigo-100 text-indigo-600 dark:bg-yellow-100 dark:text-yellow-600 @else bg-gray-100 text-gray-900 @endif hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block">{{ $domain->published_posts->count() }}</span>
                                </a>
                                @endif
                            @endforeach
                        </nav>
                    </div>
                </div>
            </div>

            <div class="mt-12 max-w-lg mx-auto grid gap-8 lg:grid-cols-3 lg:max-w-none">
                @forelse($posts as $post)
                    <x-models.post-card :post="$post" />
                @empty
                    <p class="col-span-3 mt-3 max-w-2xl mx-auto text-xl text-gray-500 dark:text-slate-300 sm:mt-4">
                        Oups, il n'y a pas encore d'articles ici, patience, ça arrive ;)
                    </p>
                @endforelse
            </div>

            <div class="my-4">
                {{ $posts->links() }}
            </div>

        </div>
    </div>
