<x-guest-layout>
    <div class="relative py-16 bg-white dark:bg-slate-900 overflow-hidden">
        <div class="hidden lg:block lg:absolute lg:inset-y-0 lg:h-full lg:w-full">
            <div class="relative h-full text-lg max-w-screen-sm mx-auto" aria-hidden="true">
                <svg class="absolute top-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="74b3fd99-0a6f-4271-bef2-e80eeafdf357" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200 dark:text-gray-700" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#74b3fd99-0a6f-4271-bef2-e80eeafdf357)" />
                </svg>
                <svg class="absolute top-1/2 right-full transform -translate-y-1/2 -translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200 dark:text-gray-700" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)" />
                </svg>
                <svg class="absolute bottom-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="d3eb07ae-5182-43e6-857d-35c643af9034" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200 dark:text-gray-700" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#d3eb07ae-5182-43e6-857d-35c643af9034)" />
                </svg>
            </div>
        </div>
        <div class="relative px-4 sm:px-6 lg:px-8">
            <div class="text-lg max-w-screen-sm mx-auto">
                <h1>
                    <span class="block text-base text-center text-indigo-600 dark:text-sky-500 font-semibold tracking-wide uppercase">{{ $post->blog_domain->name }}</span>
                    <span class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 dark:text-slate-100 sm:text-4xl">{{ $post->title }}</span>
                </h1>
                <p class="mt-8 text-xl text-gray-500 dark:text-slate-300 leading-8">
                    {{ $post->excerpt }}
                </p>
            </div>
            <div class="mt-6 max-w-screen-md prose prose-indigo prose-lg text-gray-500 dark:text-slate-300 mx-auto">
                <img class="w-full rounded-lg" src="{{ $post->cover }}" alt="" width="1310" height="873">
                @foreach($post->html_content as $k => $block)
                    @if($k % 2)
                    <pre><x-torchlight-code class="text-sm" language="{{ $block['language']}}">{!! $block['content'] !!}</x-torchlight-code></pre>
                    @else
                    <x-markdown>
                        {!! $block !!}
                    </x-markdown>
                    @endif
                @endforeach
            </div>

            @if($post->has_next || $post->has_previous)
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center">
                        <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 dark:text-slate-100 sm:text-4xl">
                            Série
                        </h2>
                        <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 dark:text-slate-300 sm:mt-4">
                            Cet article est un chapitre d'une série de plusieurs articles
                        </p>
                    </div>
                    <div class="mt-12 max-w-screen-md mx-auto grid gap-8 lg:grid-cols-2">
                        @if($post->has_previous)
                            <div>
                                <p class="text-xl tracking-tight font-extrabold text-gray-900 dark:text-slate-100 mb-4">Chapitre précédent</p>
                                <x-models.post-card :post="$post->previous" />
                            </div>
                        @else
                            <div class="w-4"></div>
                        @endif

                        @if($post->has_next)
                            <div class="flex flex-col">
                                <p class="text-xl tracking-tight font-extrabold text-gray-900 dark:text-slate-100 mb-4">Chapitre suivant</p>
                                <x-models.post-card class="flex-1" :post="$post->next" />
                            </div>
                        @else
                            <div class="w-4"></div>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-guest-layout>
