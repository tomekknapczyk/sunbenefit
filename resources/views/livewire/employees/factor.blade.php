<div class="grid grid-cols-6 gap-6 p-2">
    <div class="col-span-6 sm:col-span-4">
        <form wire:submit.prevent="saveFactor">
            <x-jet-label for="price" value="{{ $factor->label }}" />
            <div class="flex item-center mt-1">
                <x-jet-input type="text" class="block w-full" wire:model.defer="price"/>
                <x-jet-action-message class="ml-3 text-white bg-green-200 p-2 rounded" on="factorChanged">
                    {{ __('Saved.') }}
                </x-jet-action-message>
                <x-jet-button wire:loading.attr="disabled" class="ml-3">
                    {{ __('Save') }}
                </x-jet-button>
            </div>
            <x-jet-input-error for="price" class="mt-2" />
        </form>
    </div>
</div>
