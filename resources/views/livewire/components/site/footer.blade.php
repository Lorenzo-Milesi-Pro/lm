<footer class="bg-white">
  <div class="max-w-7xl mx-auto py-12 px-4 overflow-hidden sm:px-6 lg:px-8">
    <nav class="-mx-5 -my-2 flex flex-wrap justify-center" aria-label="Footer">
      <div class="px-5 py-2">
        <a href="{{ route('solutions') }}" class="text-base text-gray-500 hover:text-gray-900">
          {{ __('Solutions') }}
        </a>
      </div>

      <div class="px-5 py-2">
        <a href="{{ route('contact') }}" class="text-base text-gray-500 hover:text-gray-900">
          {{ __('Contact') }}
        </a>
      </div>

    </nav>
    <p class="mt-8 text-center text-base text-gray-400">
        {{ config('app.name') }} - {{ Carbon\Carbon::now()->year }}
    </p>
  </div>
</footer>
