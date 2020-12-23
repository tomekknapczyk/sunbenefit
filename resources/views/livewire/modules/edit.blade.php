<div>
    <p class="font-black text-2xl mb-5 dark:text-gray-400">{{ $module->name}}</p>
    <x-jet-form-section submit="saveModule">
        <x-slot name="title">
            Dane modułu
        </x-slot>

        <x-slot name="description">
            Tutaj możesz zmienić dane modułu i jego zdjęcie
            <div class="py-4">
                <livewire:modules.photo :module="$module"/>
            </div>
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
                <x-jet-input id="power" type="text" class="mt-1 block w-full" wire:model="power" wire:keyup='calcMpower'/>
                <x-jet-input-error for="power" class="mt-2" />
            </div>

            <!-- Warranty -->
            <div class="col-span-3 sm:col-span-2">
                <x-jet-label for="warranty" value="{{ __('Warranty') }}" />
                <x-jet-input id="warranty" type="text" class="mt-1 block w-full" wire:model.defer="warranty"/>
                <x-jet-input-error for="warranty" class="mt-2" />
            </div>

            <!-- Efficiency -->
            <div class="col-span-3 sm:col-span-2">
                <x-jet-label for="efficiency" value="{{ __('Efficiency') }}" />
                <x-jet-input id="efficiency" type="text" class="mt-1 block w-full" wire:model.defer="efficiency"/>
                <x-jet-input-error for="efficiency" class="mt-2" />
            </div>

            <!-- Performance -->
            <div class="col-span-3 sm:col-span-2">
                <x-jet-label for="performance" value="{{ __('Performance after 25 years') }}" />
                <x-jet-input id="performance" type="text" class="mt-1 block w-full" wire:model.defer="performance"/>
                <x-jet-input-error for="performance" class="mt-2" />
            </div>

            <!-- P max -->
            <div class="col-span-3 sm:col-span-2">
                <x-jet-label for="pmax" value="{{ __('P max') }}" />
                <x-jet-input id="pmax" type="text" class="mt-1 block w-full" wire:model.defer="pmax"/>
                <x-jet-input-error for="pmax" class="mt-2" />
            </div>

            <!-- Lenght -->
            <div class="col-span-3 sm:col-span-2">
                <x-jet-label for="length" value="{{ __('Lenght') }} mm" />
                <x-jet-input id="length" type="number" min="0" class="mt-1 block w-full" wire:model="length" wire:keyup='calcArea' wire:click='calcArea'/>
                <x-jet-input-error for="length" class="mt-2" />
            </div>

            <!-- Width -->
            <div class="col-span-3 sm:col-span-2">
                <x-jet-label for="width" value="{{ __('Width') }} mm" />
                <x-jet-input id="width" type="number" min="0" class="mt-1 block w-full" wire:model="width" wire:keyup='calcArea' wire:click='calcArea'/>
                <x-jet-input-error for="width" class="mt-2" />
            </div>

            <!-- Frame -->
            <div class="col-span-3 sm:col-span-2">
                <x-jet-label for="frame" value="{{ __('Frame') }} mm" />
                <x-jet-input id="frame" type="number" min="0" class="mt-1 block w-full" wire:model.defer="frame"/>
                <x-jet-input-error for="frame" class="mt-2" />
            </div>

            <!-- Area -->
            <div class="col-span-3 sm:col-span-2">
                <x-jet-label for="area" value="{{ __('Area') }} m2" />
                <x-jet-input id="area" type="text" class="mt-1 block w-full" wire:model="area"/>
                <x-jet-input-error for="area" class="mt-2" />
            </div>

            <!-- Mpower -->
            <div class="col-span-3 sm:col-span-2">
                <x-jet-label for="mpower" value="{{ __('Power per m2') }}" />
                <x-jet-input id="mpower" type="text" class="mt-1 block w-full" wire:model="mpower"/>
                <x-jet-input-error for="mpower" class="mt-2" />
            </div>

            <!-- Description -->
            <div class="col-span-6 sm:col-span-6">
                <x-jet-label for="description" value="{{ __('Description') }}" />
                <textarea id="description" class="mt-1 block w-full form-input rounded-md shadow-sm" wire:model.defer="description" autocomplete="description" rows="6"></textarea>
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
</div>
