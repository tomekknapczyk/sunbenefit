<x-jet-form-section submit="saveFactor">
    <x-slot name="title">
        Dane współczynnika
    </x-slot>

    <x-slot name="description">
        Tutaj możesz zmienić dane współczynnika
    </x-slot>

    <x-slot name="form">
        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="label" value="{{ __('Name') }}" />
            <x-jet-input id="label" type="text" class="mt-1 block w-full" wire:model.defer="label"/>
            <x-jet-input-error for="label" class="mt-2" />
        </div>

        <!-- Price -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="price" value="{{ __('Value') }}" />
            <x-jet-input id="price" type="text" class="mt-1 block w-full" wire:model.defer="price"/>
            <x-jet-input-error for="price" class="mt-2" />
        </div>

        <!-- Editable -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label value="{{ __('Editable by user') }}" />
            <div class="flex items-center mt-2">
                <input type="radio" id="editable_yes" wire:model.defer="editable" name="editable" class="appearance-none h-3 w-3 border border-gray-400 rounded-full checked:bg-gray-900 dark:checked:bg-gray-100 checked:border-transparent focus:outline-none" value="1" />
                <x-jet-label for="editable_yes" value="{{ __('Yes') }}" class="pl-1 leading-none" />
            </div>
            <div class="flex items-center mt-2">
                <input type="radio" id="editable_no" wire:model.defer="editable" name="editable" class="appearance-none h-3 w-3 border border-gray-400 rounded-full checked:bg-gray-900 dark:checked:bg-gray-100 checked:border-transparent focus:outline-none" value="0" />
                <x-jet-label for="editable_no" value="{{ __('No') }}" class="pl-1 leading-none" />
            </div>
            <x-jet-input-error for="editable" class="mt-2" />
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