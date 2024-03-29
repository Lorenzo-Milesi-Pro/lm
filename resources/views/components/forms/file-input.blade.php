<label for="{{ $model }}" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
    {{ $slot }} {{ $required ?? '' ? '*' : '' }}
</label>
<div class="mt-1 sm:mt-0 sm:col-span-2" x-data="drop_file_component('{{ $model }}')" >
    <div class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md"
         x-on:drop="dropingFile = false"
         x-on:drop.prevent="handleFileDrop($event)"
         x-on:dragover.prevent="dropingFile = true"
         x-on:dragleave.prevent="dropingFile = false"
    >
        <div class="space-y-1 text-center">
            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <div class="flex text-sm text-gray-600">
                <label for="file-upload"
                       class="relative cursor-pointer bg-white rounded-md font-medium text-sky-600 hover:text-sky-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-sky-500 px-2">
                    <span>Upload a file</span>
                    <input id="file-upload" wire:model="{{ $model }}" type="file" class="sr-only">
                </label>
                <p class="pl-1">or drag and drop</p>
            </div>
        </div>
    </div>
    @error($model)
        <span class="text-sm text-red-400">{{ $message }}</span>
    @enderror
</div>

