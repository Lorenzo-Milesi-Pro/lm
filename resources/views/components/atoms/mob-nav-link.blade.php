<a href="{{ $route }}" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50 dark:hover:bg-slate-700">
    <x-dynamic-component component="icons.{{ $icon }}" class="flex-shrink-0 h-6 w-6 text-sky-600 dark:text-sky-400" />
    <span class="ml-3 text-base font-medium text-gray-900 dark:text-slate-200">
        {{ $slot }}
    </span>
</a>
