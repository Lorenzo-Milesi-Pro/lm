<div>
    @if($show)
        <x-modal-layout>
            <form @click.outside="Livewire.emit('close')" wire:submit.prevent="store" class="space-y-8 divide-y divide-gray-200">
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div>
                        <div class="flex justify-between">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                {{ __('Create a new Domain') }}
                            </h3>
                            <span wire:click.prevent="close">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500 hover:text-red-500 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        </span>
                        </div>

                        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                            <div class="sm:grid sm:grid-cols-4 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <x-forms.text-input model="name" required>{{ __('Name') }}</x-forms.text-input>
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
                    </div>
                </div>
            </form>
        </x-modal-layout>
    @endif
</div>
