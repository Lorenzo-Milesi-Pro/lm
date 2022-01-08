<label for="{{ $model }}" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
    {{ $slot }} {{ $required ?? '' ? '*' : '' }}
</label>
<div class="mt-1 sm:mt-0 sm:col-span-2">
    <textarea id="{{ $model }}" name="{{ $model }}" rows="3" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md @error($model) border-red-300 @enderror"></textarea>
    @error($model)
    <span class="text-sm text-red-400">{{ $message }}</span>
    @enderror
</div>
