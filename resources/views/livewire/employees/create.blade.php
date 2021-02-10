<x-jet-form-section submit="createUser">
    <x-slot name="title">
        Dane przedstawiciela
    </x-slot>

    <x-slot name="description">
        Uzupełnij dane nowego przedstawiciela.
    </x-slot>

    <x-slot name="form">
        <!-- Code -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="code" value="{{ __('Code') }}" />
            <x-jet-input id="code" type="text" class="mt-1 block w-full" wire:model.defer="code"/>
            <x-jet-input-error for="code" class="mt-2" />
        </div>

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('First Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name"/>
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Lastname -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="lastname" value="{{ __('Lastname') }}" />
            <x-jet-input id="lastname" type="text" class="mt-1 block w-full" wire:model.defer="lastname"/>
            <x-jet-input-error for="lastname" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="phone" value="{{ __('Phone') }}" />
            <x-jet-input id="phone" type="text" class="mt-1 block w-full" wire:model.defer="phone"/>
            <x-jet-input-error for="phone" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.lazy="email"/>
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <!-- Grupa -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="group" value="{{ __('Group') }}" />
            <select id="group" wire:model.defer="group" class="mt-1 block form-select w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                @foreach ($groups as $group)
                    <option value="{{ $group->name }}">{{ $group->name }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="group" class="mt-2" />
        </div>

        <!-- Editable margin -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label value="{{ __('Editable margin') }}" />
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

        <div class="rounded-xl p-3 col-span-6 sm:col-span-4 shadow dark:border dark:border-gray-400">
            <x-jet-label for="password" value="{{ __('New Password') }}" />
            <div>
                <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="password"/>
            </div>
            <div class="mt-2">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="password_confirmation"/>
                
                <x-jet-input-error for="password" class="mt-2" />
                <x-jet-input-error for="password_confirmation" class="mt-2" />
            </div>
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
