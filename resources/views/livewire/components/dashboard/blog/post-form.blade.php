<div>
    @if($show)
        <x-modal-layout>
            <form @click.outside="Livewire.emit('close')" wire:submit.prevent="store" class="space-y-8 divide-y divide-gray-200">
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div>
                        <div class="flex justify-between">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                @if($post->title)
                                    {{ __('Update post : ') . $post->title }}
                                @else
                                    {{ __('Create a new Post') }}
                                @endif
                            </h3>
                            <span wire:click.prevent="close">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500 hover:text-red-500 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        </span>
                        </div>

                        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                            <div class="sm:grid sm:grid-cols-4 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <x-forms.text-input model="title" required>{{ __('Title') }}</x-forms.text-input>
                            </div>

                            <div class="sm:grid sm:grid-cols-4 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <x-forms.select-input model="domain" required :options="$domains" value="name" key="id">
                                    {{ __('Domain') }}
                                </x-forms.select-input>
                            </div>

                            <livewire:components.dashboard.blog.domain-quick-form />

                            <div class="sm:grid sm:grid-cols-4 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <x-forms.textarea-input model="excerpt">{{ __('Excerpt') }}</x-forms.textarea-input>
                            </div>

                            <div class="sm:grid sm:grid-cols-4 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <x-forms.file-input model="cover">{{ __('Cover') }}</x-forms.file-input>
                            </div>


                            @if($tempCover)
                                <div class="sm:grid sm:grid-cols-4 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <p></p>
                                    <img src="{{ $tempCover }}"  alt=""/>
                                </div>
                            @endif

                            <div class="sm:grid sm:grid-cols-4 sm:gap-4  sm:border-t sm:border-gray-200 sm:pt-5 sm:items-baseline">
                                <div>
                                    <div class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700" id="label-email">
                                        {{ __('Publication') }}
                                    </div>
                                </div>
                                <div class="mt-4 sm:mt-0 sm:col-span-2">
                                    <div class="max-w-lg space-y-4">
                                        <div class="relative flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="publish" wire:model="publish" type="checkbox" class="focus:ring-sky-500 h-4 w-4 text-sky-600 border-gray-300 rounded">
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="publish" class="font-medium text-gray-700">Published</label>
                                                <p class="text-gray-500">Display on site.</p>
                                            </div>
                                        </div>

                                        <div class="relative flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="hasPreview" wire:model="hasPreview" type="checkbox" class="focus:ring-sky-500 h-4 w-4 text-sky-600 border-gray-300 rounded">
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="hasPreview" class="font-medium text-gray-700">Public Preview</label>
                                                <p class="text-gray-500">Generate a public preview link.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                        <div>
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                {{ __('Content') }}
                            </h3>
                        </div>
                        <div class="space-y-6 sm:space-y-5">
                            <div class="mt-1 sm:mt-0 sm:col-span-3">
                                <div>
                                    <div class="flex items-center space-x-2" aria-orientation="horizontal" role="tablist">
                                        <button id="tabs-1-tab-1"
                                                wire:click="$set('write', true)"
                                                @if($write)
                                                class="text-gray-900 bg-gray-100 hover:bg-gray-200"
                                                @else
                                                class="text-gray-500 hover:text-gray-900 bg-white hover:bg-gray-100 px-3 py-1.5 border border-transparent text-sm font-medium rounded-md"
                                                @endif
                                                aria-controls="tabs-1-panel-1" role="tab" type="button">Write</button>
                                        <button id="tabs-1-tab-2"
                                                wire:click="$set('write', false)"
                                                @if(!$write)
                                                class="text-gray-900 bg-gray-100 hover:bg-gray-200"
                                                @else
                                                class="text-gray-500 hover:text-gray-900 bg-white hover:bg-gray-100 px-3 py-1.5 border border-transparent text-sm font-medium rounded-md"
                                                @endif
                                                aria-controls="tabs-1-panel-2" role="tab" type="button">Preview</button>
                                        @error('content')
                                        <span class="text-sm text-red-400">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-2">
                                        @if($write)
                                            <div id="tabs-1-panel-1" class="p-0.5 -m-0.5 rounded-lg" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
                                                <label for="content" class="sr-only">Content</label>
                                                <div>
                                                    <textarea wire:model="content"  id="content" class="shadow-sm focus:ring-sky-500 focus:border-sky-500 block w-full sm:text-sm border-gray-300 rounded-md min-h-screen @error('content') border-red-300 @enderror" placeholder="Add your content..."></textarea>
                                                </div>
                                            </div>
                                        @else
                                            <div id="tabs-1-panel-2" class="p-0.5 -m-0.5 rounded-lg" aria-labelledby="tabs-1-tab-2" role="tabpanel" tabindex="0">
                                                <div class="mx-px mt-px px-3 pt-2 pb-12 text-sm leading-5 text-gray-800 min-h-screen">
                                                    {!! Str::markdown($content ?? '') !!}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-5">
                    <div class="flex justify-end">
                        <button wire:click.prevent="close" type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                            Cancel
                        </button>
                        <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                            Save
                        </button>
                        <button wire:click.prevent="storeAndClose" type="button" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                            Save and close
                        </button>
                    </div>
                </div>
            </form>
        </x-modal-layout>
    @endif
</div>

<script>
    function drop_file_component($model) {
        return {
            dropingFile: false,
            handleFileDrop(e) {
                if (event.dataTransfer.files.length > 0) {
                    const files = e.dataTransfer.files;
                    @this.uploadMultiple($model, files,
                        (uploadedFilename) => {}, () => {}, (event) => {}
                    )
                }
            }
        };
    }
</script>
