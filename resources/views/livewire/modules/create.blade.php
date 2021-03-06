<x-jet-form-section submit="createModule">
    <x-slot name="title">
        Dane modułu
    </x-slot>

    <x-slot name="description">
        Uzupełnij dane nowego modułu.
    </x-slot>

    <x-slot name="form">
        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name"/>
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Power -->
        <div class="col-span-3 sm:col-span-2">
            <x-jet-label for="power" value="{{ __('Power') }}" />
            <x-jet-input id="power" type="text" class="mt-1 block w-full" wire:model.defer="power"/>
            <x-jet-input-error for="power" class="mt-2" />
        </div>

        <!-- Description -->
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="description" value="{{ __('Description') }}" />
            <textarea id="description" class="mt-1 block w-full form-input rounded-md shadow-sm" wire:model.defer="description" rows="6"></textarea>
            <x-jet-input-error for="description" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3 text-white bg-green-200 p-2 rounded" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
