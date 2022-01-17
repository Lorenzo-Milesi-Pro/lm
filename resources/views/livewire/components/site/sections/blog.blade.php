    <div class="relative bg-gray-50 pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">
                    Le Blog
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Ici, c'est le coin où je peux m'exprimer sur mon travail, échanger sur mes retours d'expérience
                    ou encore apporter des réflexions ouvertes sur le développement et autres sujets divers
                </p>
            </div>

            <div class="mt-8">
                <div class="block">
                    <div class="border-b border-gray-200">
                        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                            <a href="{{ route('blog') }}"
                               class="@if(!$d) border-indigo-500 text-indigo-600 whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm @else border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200 whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm @endif">
                                {{ __('Tous') }}

                                <span class="@if(!$d) bg-indigo-100 text-indigo-600 @else bg-gray-100 text-gray-900 @endif hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block">{{ $postsCount }}</span>
                            </a>
                            @foreach($domains as $domain)
                                @if($domain->published_posts->count())
                                <a href="{{ route('blog', ['d' => $domain->slug]) }}"
                                   class="@if($domain->slug === $d) border-indigo-500 text-indigo-600 whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm @else border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200 whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm @endif">
                                    {{ $domain->name }}

                                    <span class="@if($domain->slug === $d) bg-indigo-100 text-indigo-600 @else bg-gray-100 text-gray-900 @endif hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block">{{ $domain->published_posts->count() }}</span>
                                </a>
                                @endif
                            @endforeach
                        </nav>
                    </div>
                </div>
            </div>

            <div class="mt-12 max-w-lg mx-auto grid gap-8 lg:grid-cols-3 lg:max-w-none">
                @forelse($posts as $post)
                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                        <div class="flex-shrink-0">
                            <img class="h-48 w-full object-cover" src="{{ $post->cover }}" alt="">
                        </div>
                        <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-sky-600">
                                    <a href="{{ route('blog', ['d' => $post->blog_domain->slug ]) }}" class="hover:underline">
                                        {{ $post->blog_domain->name }}
                                    </a>
                                </p>
                                <a href="{{ route('post', ['post' => $post]) }}" class="block mt-2">
                                    <p class="text-xl font-semibold text-gray-900">
                                        {{ $post->title }}
                                    </p>
                                    <p class="mt-3 text-base text-gray-500">
                                        {{ $post->excerpt }}
                                    </p>
                                </a>
                            </div>
                            <div class="mt-6 flex items-center">
                                <div class="flex space-x-1 text-sm text-gray-500">
                                    <time datetime="2020-03-16"> {{ $post->updated_at->format('d M Y') }} </time>
                                    <span aria-hidden="true"> &middot; </span>
                                    <span> ~ {{ $post->reading_time }} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="col-span-3 mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                        Oups, il n'y a pas encore d'articles ici, patience, ça arrive ;)
                    </p>
                @endforelse
            </div>
        </div>
    </div>
