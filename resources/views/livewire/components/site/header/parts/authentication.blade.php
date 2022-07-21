@if (Route::has('login'))
<div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
    @auth
    <x-atoms.nav-link route="{{ route('dashboard') }}">{{ __('Dashboard') }}</x-atoms.nav-link>
    @else
    <x-atoms.nav-link route="{{ route('login') }}">{{ __('Sign in') }}</x-atoms.nav-link>
    @if (Route::has('register'))
    <x-atoms.nav-link route="{{ route('register') }}">{{ __('Sign up') }}</x-atoms.nav-link>
    @endif
    @endauth
</div>
@endif
