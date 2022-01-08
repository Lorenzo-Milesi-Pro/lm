<x-app-layout>
    <x-slot name="side">
        <x-link href="{{ route('dashboard.blog') }}"
                :active="request()->routeIs('dashboard.blog')">
            {{ __('Posts') }}
        </x-link>
        <x-link href="{{ route('dashboard.blog') }}"
                :active="request()->routeIs('dashboard.blog.domains')">
            {{ __('Domains') }}
        </x-link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:components.dashboard.blog.post-manager />
        </div>
    </div>
</x-app-layout>
