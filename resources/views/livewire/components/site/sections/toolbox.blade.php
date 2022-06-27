    <div class="relative bg-gray-50 pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">
                    La Toolbox 🛠
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Ici, c'est le coin où je conserve des outils que j'utilise ou des petites
                    notes, des curiosités, des conseils que j'ai glanés parci-parlà.
                </p>
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
                        Oups, il n'y a pas encore d'éléments ici, patience, ça arrive ;)
                    </p>
                @endforelse
            </div>

            @if($posts->count())
                <div class="my-4">
                    {{ $posts->links() }}
                </div>
            @endif

        </div>
    </div>
