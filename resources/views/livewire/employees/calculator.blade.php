<x-jet-form-section submit="saveCalculator">
    <x-slot name="title">
        Dane kalkulatora
    </x-slot>

    <x-slot name="description">
        Tutaj możesz wybrać 3 widoczne moduły oraz ustawić dla nich marżę.
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4 p-4 border rounded-lg">
            <!-- Module 1 -->
            <div class="p-2">
                <x-jet-label for="module_1" value="{{ __('Module') }} 1" />
                <select id="module_1" wire:model.defer="module_1" class="mt-1 block form-select w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    <option value="0">Brak</option>
                    @foreach ($modules as $module)
                        <option value="{{ $module->id }}">{{ $module->name }} | {{ $module->power }} W</option>
                    @endforeach
                </select>
                <x-jet-input-error for="module_1" class="mt-2" />
            </div>

            <!-- margin 1 -->
            <div class="p-2">
                <x-jet-label for="margin_1" value="{{ __('Margin') }}" />
                <div class="relative z-20">
                    <x-jet-input id="margin_1" type="text" class="mt-1 block w-full " wire:model.lazy="margin_1"/>
                    <p class="absolute z-10 top-0 bottom-0 h-full text-lg font-samibold right-0 m-auto flex items-center justify-center rounded-tr-md rounded-br-md bg-gray-500 text-gray-300 px-4">%</p>
                </div>
                <x-jet-input-error for="margin_1" class="mt-2" />
            </div>
        </div>

        <div class="col-span-6 sm:col-span-4 p-4 border rounded-lg">
            <!-- Module 2 -->
            <div class="p-2">
                <x-jet-label for="module_2" value="{{ __('Module') }} 2" />
                <select id="module_2" wire:model.defer="module_2" class="mt-1 block form-select w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    <option value="0">Brak</option>
                    @foreach ($modules as $module)
                        <option value="{{ $module->id }}">{{ $module->name }} | {{ $module->power }} W</option>
                    @endforeach
                </select>
                <x-jet-input-error for="module_2" class="mt-2" />
            </div>

            <!-- margin 2 -->
            <div class="p-2">
                <x-jet-label for="margin_2" value="{{ __('Margin') }}" />
                <div class="relative z-20">
                    <x-jet-input id="margin_2" type="text" class="mt-1 block w-full" wire:model.lazy="margin_2"/>
                    <p class="absolute z-10 top-0 bottom-0 h-full text-lg font-samibold right-0 m-auto flex items-center justify-center rounded-tr-md rounded-br-md bg-gray-500 text-gray-300 px-4">%</p>
                </div>
                <x-jet-input-error for="margin_2" class="mt-2" />
            </div>
        </div>

        <div class="col-span-6 sm:col-span-4 p-4 border rounded-lg">
            <!-- Module 3 -->
            <div class="p-2">
                <x-jet-label for="module_3" value="{{ __('Module') }} 3" />
                <select id="module_3" wire:model.defer="module_3" class="mt-1 block form-select w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    <option value="0">Brak</option>
                    @foreach ($modules as $module)
                        <option value="{{ $module->id }}">{{ $module->name }} | {{ $module->power }} W</option>
                    @endforeach
                </select>
                <x-jet-input-error for="module_3" class="mt-2" />
            </div>

            <!-- margin 3 -->
            <div class="p-2">
                <x-jet-label for="margin_3" value="{{ __('Margin') }}" />
                <div class="relative z-20">
                    <x-jet-input id="margin_3" type="text" class="mt-1 block w-full" wire:model.lazy="margin_3"/>
                    <p class="absolute z-10 top-0 bottom-0 h-full text-lg font-samibold right-0 m-auto flex items-center justify-center rounded-tr-md rounded-br-md bg-gray-500 text-gray-300 px-4">%</p>
                </div>
                <x-jet-input-error for="margin_3" class="mt-2" />
            </div>
        </div>

        <div class="col-span-6">
            <x-jet-action-message class="mr-3 text-white bg-red-400 p-2 rounded" on="modulesFail">
                {{ __('Nie można wybrać dwóch takich samych modułów.') }}
            </x-jet-action-message>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3 text-white bg-green-200 p-2 rounded" on="modulesChanged">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>