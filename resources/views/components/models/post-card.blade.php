<div {{ $attributes->merge(['class' => 'flex flex-col rounded-lg shadow-lg overflow-hidden' ]) }}>
    <a href="{{ route('post', $post) }}" class="flex-shrink-0">
        <img class="h-48 w-full object-cover" src="{{ $post->cover }}" alt="">
    </a>
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
        <div class="mt-6 flex items-center justify-between text-gray-500 text-sm">
            <div class="flex space-x-1">
                <time datetime="2020-03-16"> {{ $post->updated_at->format('d M Y') }} </time>
                <span aria-hidden="true"> &middot; </span>
                <span> ~ {{ $post->reading_time }} </span>
            </div>
            <div class="flex items-center space-x-2">
                <x-icons.book-open class="h-5 w-5" />
                <p>{{ $post->views }}</p>
            </div>
        </div>
    </div>
</div>
