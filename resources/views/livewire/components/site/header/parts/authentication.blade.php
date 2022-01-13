@if (Route::has('login'))
<div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
    @auth
    <a href="{{ route('dashboard') }}" class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">
        {{ __('Dashboard') }}
    </a>
    @else
    <a href="{{ route('login') }}" class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">
        {{ __('Sign in') }}
    </a>
    @if (Route::has('register'))
    <a href="{{ route('register') }}" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-sky-600 hover:bg-sky-700">
        {{ __('Sign up') }}
    </a>
    @endif
    @endauth
</div>
@endif
