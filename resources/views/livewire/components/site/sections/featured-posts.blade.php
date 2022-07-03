<div>
    @if($show)
        <div class="bg-gray-50">
            <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-baseline sm:justify-between">
                    <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">
                        {{ __('Featured posts') }}
                    </h2>
                    <a href="{{ route('blog') }}" class="hidden text-sm font-semibold text-sky-600 hover:text-sky-500 sm:block">
                        {{ __('Want more?') }}<span aria-hidden="true"> &rarr;</span></a>
                </div>

                <div class="mt-6 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:grid-rows-2 sm:gap-x-6 lg:gap-8">
                    <div class="group aspect-w-2 aspect-h-1 rounded-lg overflow-hidden sm:aspect-h-1 sm:aspect-w-1 sm:row-span-2">
                        <img src="{{ $mostViewedPost->cover }}" alt="{{ $mostViewedPost->title }}" class="object-center object-cover group-hover:opacity-75">
                        <div aria-hidden="true" class="bg-gradient-to-b from-transparent to-black opacity-50"></div>
                        <div class="p-6 flex items-end">
                            <div class="w-full">
                                <h3 class="font-semibold text-white">
                                    <a href="{{ route('post', $mostViewedPost) }}">
                                        <span class="absolute inset-0"></span>
                                        {{ $mostViewedPost->title }}
                                    </a>
                                </h3>
                                <p aria-hidden="true" class="mt-1 text-sm text-white">
                                    {{ $mostViewedPost->excerpt }}
                                </p>

                                <div aria-hidden="true" class="mt-1 text-sm text-white">
                                    <div class="mt-6 flex items-center justify-between text-sm">
                                        <div class="flex space-x-1">
                                            <time datetime="2020-03-16"> {{ $mostViewedPost->updated_at->format('d M Y') }} </time>
                                            <span aria-hidden="true"> &middot; </span>
                                            <span> ~ {{ $mostViewedPost->reading_time }} </span>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <x-icons.book-open class="h-5 w-5" />
                                            <p>{{ $mostViewedPost->views }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="group aspect-w-2 aspect-h-1 rounded-lg overflow-hidden sm:relative sm:aspect-none sm:h-full">
                        <img src="{{ $mostRecentlyViewedPost->cover }}" alt="{{ $mostRecentlyViewedPost->title }}" class="object-center object-cover group-hover:opacity-75 sm:absolute sm:inset-0 sm:w-full sm:h-full">
                        <div aria-hidden="true" class="bg-gradient-to-b from-transparent to-black opacity-50 sm:absolute sm:inset-0"></div>
                        <div class="p-6 flex items-end sm:absolute sm:inset-0">
                            <div class="w-full">
                                <h3 class="font-semibold text-white">
                                    <a href="{{ route('post', $mostRecentlyViewedPost) }}">
                                        <span class="absolute inset-0"></span>
                                        {{ $mostRecentlyViewedPost->title }}
                                    </a>
                                </h3>
                                <p aria-hidden="true" class="mt-1 text-sm text-white">
                                    {{ $mostRecentlyViewedPost->excerpt }}
                                </p>

                                <div aria-hidden="true" class="mt-1 text-sm text-white">
                                    <div class="mt-6 flex items-center justify-between text-sm">
                                        <div class="flex space-x-1">
                                            <time datetime="2020-03-16"> {{ $mostRecentlyViewedPost->updated_at->format('d M Y') }} </time>
                                            <span aria-hidden="true"> &middot; </span>
                                            <span> ~ {{ $mostRecentlyViewedPost->reading_time }} </span>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <x-icons.book-open class="h-5 w-5" />
                                            <p>{{ $mostRecentlyViewedPost->views }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="group aspect-w-2 aspect-h-1 rounded-lg overflow-hidden sm:relative sm:aspect-none sm:h-full">
                        <img src="{{ $latestPost->cover }}" alt="{{ $latestPost->title }}" class="object-center object-cover group-hover:opacity-75 sm:absolute sm:inset-0 sm:w-full sm:h-full">
                        <div aria-hidden="true" class="bg-gradient-to-b from-transparent to-black opacity-50 sm:absolute sm:inset-0"></div>
                        <div class="p-6 flex items-end sm:absolute sm:inset-0">
                            <div class="w-full">
                                <h3 class="font-semibold text-white">
                                    <a href="{{ route('post', $latestPost) }}">
                                        <span class="absolute inset-0"></span>
                                        {{ $latestPost->title }}
                                    </a>
                                </h3>
                                <p aria-hidden="true" class="mt-1 text-sm text-white">{{ $latestPost->excerpt }}</p>

                                <div aria-hidden="true" class="mt-1 text-sm text-white">
                                    <div class="mt-6 flex items-center justify-between text-sm">
                                        <div class="flex space-x-1">
                                            <time datetime="2020-03-16"> {{ $latestPost->updated_at->format('d M Y') }} </time>
                                            <span aria-hidden="true"> &middot; </span>
                                            <span> ~ {{ $latestPost->reading_time }} </span>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <x-icons.book-open class="h-5 w-5" />
                                            <p>{{ $latestPost->views }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 sm:hidden">
                    <a href="#" class="block text-sm font-semibold text-indigo-600 hover:text-indigo-500">Browse all categories<span aria-hidden="true"> &rarr;</span></a>
                </div>
            </div>
        </div>
    @endif
</div>

