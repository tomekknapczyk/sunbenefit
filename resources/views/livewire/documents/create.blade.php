<x-jet-form-section submit="createDocument">
    <x-slot name="title">
        Dane dokumentu
    </x-slot>

    <x-slot name="description">
        Uzupełnij dane nowego dokumentu.
    </x-slot>

    <x-slot name="form">
        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <div>
                <input type="file" wire:model="document" class="w-full">
                <x-jet-input-error for="document" class="mt-2" />

                <div wire:loading wire:target="document">Wysyłam...</div>
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-button wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
