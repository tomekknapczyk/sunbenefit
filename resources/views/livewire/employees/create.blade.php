<x-jet-form-section submit="createUser">
    <x-slot name="title">
        Dane przedstawiciela
    </x-slot>

    <x-slot name="description">
        Uzupełnij dane nowego przedstawiciela.
    </x-slot>

    <x-slot name="form">
        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Lastname -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="lastname" value="{{ __('Lastname') }}" />
            <x-jet-input id="lastname" type="text" class="mt-1 block w-full" wire:model.defer="lastname" autocomplete="lastname" />
            <x-jet-input-error for="lastname" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="phone" value="{{ __('Phone') }}" />
            <x-jet-input id="phone" type="text" class="mt-1 block w-full" wire:model.defer="phone" autocomplete="phone" />
            <x-jet-input-error for="phone" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.lazy="email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <div class="rounded-xl p-3 col-span-6 sm:col-span-4 shadow">
            <x-jet-label for="password" value="{{ __('New Password') }}" />
            <div>
                <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model.debounce.200ms="password" autocomplete="new-password" />
            </div>
            <div class="mt-2">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.200ms="password_confirmation" autocomplete="new-password" />
                
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
