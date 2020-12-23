<div class="shadow overflow-hidden sm:rounded-md h-full">
    <div class="bg-white dark:bg-gray-900 p-4 2xl:p-6 h-full">
        {{-- <h3 class="hidden 2xl:block text-lg font-medium text-gray-900 dark:text-gray-100 text-center mb-2">Opcje ochrony</h3> --}}
        <div class="grid grid-cols-1  gap-3">
            <div class="sm:col-span-1">
                <x-jet-label value="{{ $projekt['label'] }}" />
                <x-jet-input type="number" step=".01" class="mt-1 block w-full" wire:model="projekt.price" />
            </div>

            <div class="sm:col-span-1">
                <x-jet-label value="{{ $uziemienie['label'] }}" />
                <x-jet-input type="number" step=".01" class="mt-1 block w-full" wire:model="uziemienie.price" />
            </div>

            <div class="sm:col-span-1">
                <x-jet-label value="{{ $acdc['label'] }}" />
                <x-jet-input type="number" step=".01" class="mt-1 block w-full" wire:model="acdc.price" />
            </div>
        </div>

        <x-jet-section-border />

        <div class="bg-green-600 rounded-lg py-2">
            <h3 class="text-lg 2xl:text-2xl font-medium text-gray-100 text-center mb-2">Przyznany Rabat</h3>

            <p class="text-center text-gray-100 font-semibold text-xl 2xl:text-4xl">{{ $this->discount }} zł</p>
        </div>
    </div>
</div>