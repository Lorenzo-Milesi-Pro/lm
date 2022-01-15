<div class="grid grid-cols-3 gap-8">
    <x-action icon="icons.newspaper" :caption="__('Create a new domain')" wire:click="create" />
</div>

<div class="h-8"></div>
<livewire:components.dashboard.blog.domain-index />
<div class="h-8"></div>
<livewire:components.dashboard.blog.domain-form />
