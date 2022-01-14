<div class="sm:grid sm:grid-cols-4 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
    <x-forms.text-input model="domain.name">{{ __('New Domain') }}</x-forms.text-input>

    <button type="submit" wire:click.prevent="store" class="col-start-3 justify-self-end w-fit inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
        {{ __('Save') }}
    </button>
</div>
