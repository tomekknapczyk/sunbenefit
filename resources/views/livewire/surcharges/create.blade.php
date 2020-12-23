<x-jet-form-section submit="createSurcharge">
    <x-slot name="title">
        Dane dopłaty
    </x-slot>

    <x-slot name="description">
        Uzupełnij dane nowej dopłaty.
    </x-slot>

    <x-slot name="form">
        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Price -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="price" value="{{ __('Cena') }}" />
            <x-jet-input id="price" type="text" class="mt-1 block w-full" wire:model.defer="price" autocomplete="price" />
            <x-jet-input-error for="price" class="mt-2" />
        </div>

        <!-- Type // module / once / kwp -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="type" value="{{ __('Typ') }}" />
            <select id="type" wire:model.defer="type" class="mt-1 block form-select w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                <option value="module">Cena z każdy moduł</option>
                <option value="kwp">Cena z każdy kWp</option>
                <option value="once">Cena jednorazowa</option>
                <option value="unit">Cena za jednostkę</option>
            </select>
            <x-jet-input-error for="type" class="mt-2" />
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
