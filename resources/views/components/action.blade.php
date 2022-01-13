<button {{ $attributes->merge() }} type="button" class="group relative block w-full border-2 border-gray-300 border-dashed rounded-lg p-8 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
    @if(isset($icon))
        <x-dynamic-component :component="$icon" thickness="1" class="mx-auto h-12 w-12 text-gray-300 group-hover:text-gray-400" />
    @endif
    @if(isset($caption))
        <span class="mt-2 block text-sm font-medium text-gray-500 group-hover:text-gray-900">{{ $caption }}</span>
    @endif
</button>
