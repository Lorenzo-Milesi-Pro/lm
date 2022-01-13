<label for="{{ $model }}" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
    {{ $slot }} {{ $required ?? '' ? '*' : '' }}
</label>
<div class="mt-1 sm:mt-0 sm:col-span-2">
    <div class="max-w-lg flex rounded-md shadow-sm">
        <input type="text" wire:model="{{ $model }}" name="{{ $model }}" id="{{ $model }}"
               class="flex-1 block w-full focus:ring-sky-500 focus:border-sky-500 min-w-0 rounded-md sm:text-sm border-gray-300 @error($model) border-red-300 @enderror">
    </div>
    @error($model)
    <span class="text-sm text-red-400">{{ $message }}</span>
    @enderror
</div>
