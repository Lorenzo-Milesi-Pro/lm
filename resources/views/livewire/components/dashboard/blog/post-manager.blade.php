<div class="grid grid-cols-3 gap-8">
    <x-action icon="icons.newspaper" :caption="__('Create a new post')" wire:click="create" />
    <x-action icon="icons.collection" :caption="__('Create a new domain')" />
</div>

<div class="h-8"></div>
<livewire:components.dashboard.blog.post-form />
