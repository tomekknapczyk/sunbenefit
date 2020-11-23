<form wire:submit.prevent="saveCalculation">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <x-jet-section-title>
            <x-slot name="title">Dane inwestora</x-slot>
            <x-slot name="description">Uzupełnij dane inwestora</x-slot>
        </x-jet-section-title>

        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white dark:bg-gray-900 sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <!-- Name -->
                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="name" value="{{ __('First Name') }} {{ __('Lastname') }} / {{ __('Company') }}" />
                            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.lazy="name" autocomplete="name" />
                            <x-jet-input-error for="name" class="mt-2" />
                        </div>

                        <!-- Nip -->
                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="nip" value="{{ __('Nip') }} ({{ __('Optional') }})" />
                            <x-jet-input id="nip" type="text" class="mt-1 block w-full" wire:model.lazy="nip" autocomplete="nip" />
                            <x-jet-input-error for="nip" class="mt-2" />
                        </div>

                        <!-- Address -->
                        <div class="col-span-6 sm:col-span-2">
                            <x-jet-label for="address" value="{{ __('Address') }}" />
                            <x-jet-input id="address" type="text" class="mt-1 block w-full" wire:model.lazy="address" autocomplete="address" />
                            <x-jet-input-error for="address" class="mt-2" />
                        </div>

                        <!-- Zip code -->
                        <div class="col-span-6 sm:col-span-2">
                            <x-jet-label for="zip_code" value="{{ __('Zip code') }}" />
                            <x-jet-input id="zip_code" type="text" class="mt-1 block w-full" wire:model.lazy="zip_code" autocomplete="zip_code" />
                            <x-jet-input-error for="zip_code" class="mt-2" />
                        </div>

                        <!-- City -->
                        <div class="col-span-6 sm:col-span-2">
                            <x-jet-label for="city" value="{{ __('City') }}" />
                            <x-jet-input id="city" type="text" class="mt-1 block w-full" wire:model.lazy="city" autocomplete="city" />
                            <x-jet-input-error for="city" class="mt-2" />
                        </div>

                        <!-- Phone -->
                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="phone" value="{{ __('Phone') }}" />
                            <x-jet-input id="phone" type="text" class="mt-1 block w-full" wire:model.lazy="phone" autocomplete="phone" />
                            <x-jet-input-error for="phone" class="mt-2" />
                        </div>

                        <!-- Email -->
                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" type="text" class="mt-1 block w-full" wire:model.lazy="email" autocomplete="email" />
                            <x-jet-input-error for="email" class="mt-2" />
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-jet-section-border />

    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <x-jet-section-title>
                <x-slot name="title">Dane inwestycji</x-slot>
                <x-slot name="description">Uzupełnij dane inwestycji</x-slot>
            </x-jet-section-title>
    
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white dark:bg-gray-900 sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <!-- Invest Address -->
                            <div class="col-span-6 sm:col-span-2">
                                <x-jet-label for="invest_address" value="{{ __('Address') }}" />
                                <x-jet-input id="invest_address" type="text" class="mt-1 block w-full" wire:model.lazy="invest_address" />
                                <x-jet-input-error for="invest_address" class="mt-2" />
                            </div>

                            <!-- Invest Zip code -->
                            <div class="col-span-6 sm:col-span-2">
                                <x-jet-label for="invest_zip_code" value="{{ __('Zip code') }}" />
                                <x-jet-input id="invest_zip_code" type="text" class="mt-1 block w-full" wire:model.lazy="invest_zip_code" />
                                <x-jet-input-error for="invest_zip_code" class="mt-2" />
                            </div>

                            <!-- Invest City -->
                            <div class="col-span-6 sm:col-span-2">
                                <x-jet-label for="invest_city" value="{{ __('City') }}" />
                                <x-jet-input id="invest_city" type="text" class="mt-1 block w-full" wire:model.lazy="invest_city" />
                                <x-jet-input-error for="invest_city" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-jet-section-border />

    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <x-jet-section-title>
                <x-slot name="title">Dane instalacji</x-slot>
                <x-slot name="description">Uzupełnij dane instalacji fotowoltaicznej</x-slot>
            </x-jet-section-title>
    
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white dark:bg-gray-900 sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <!-- Yearly Consumption -->
                            <div class="col-span-6 sm:col-span-3">
                                <x-jet-label for="consumption" value="{{ __('Yearly Consumption') }}" />
                                <x-jet-input id="consumption" type="number" class="mt-1 block w-full" wire:model="consumption" wire:keyup='calcFees'/>
                                <x-jet-input-error for="consumption" class="mt-2" />
                            </div>

                            <!-- Monthly fees -->
                            <div class="col-span-6 sm:col-span-3">
                                <x-jet-label for="fees" value="{{ __('Monthly fees') }}" />
                                <x-jet-input id="fees" type="number" class="mt-1 block w-full" wire:model="fees" wire:keyup='calcConsumption' />
                                <x-jet-input-error for="fees" class="mt-2" />
                            </div>

                            <!-- PV power -->
                            <div class="col-span-6 sm:col-span-3">
                                <x-jet-label for="pv_power" value="{{ __('PV power') }}" />
                                <x-jet-input id="pv_power" type="text" class="mt-1 block w-full" wire:model.lazy="pv_power" />
                                <x-jet-input-error for="pv_power" class="mt-2" />
                            </div>

                            <!-- Perfect PV power -->
                            <div class="col-span-6 sm:col-span-3">
                                <x-jet-label value="{{ __('Perfect PV power') }}" />
                                <p class="text-4xl text-green-500 font-bold">{{ $this->perfectPower }} kWp</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <x-jet-section-border />

    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <x-jet-section-title>
                <x-slot name="title">Dodatkowe opcje</x-slot>
                <x-slot name="description">Uzupełnij dodatkowe opcje instalacji</x-slot>
            </x-jet-section-title>
    
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white dark:bg-gray-900 sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <!-- Self deposit -->
                            <div class="col-span-6 sm:col-span-3">
                                <x-jet-label for="deposit" value="{{ __('Self deposit') }}" />
                                <x-jet-input id="deposit" type="number" class="mt-1 block w-full" wire:model.lazy="deposit"/>
                                <x-jet-input-error for="deposit" class="mt-2" />
                            </div>

                            <!-- Number of years -->
                            <div class="col-span-6 sm:col-span-3">
                                <x-jet-label for="years" value="{{ __('Number of years') }}" />
                                <x-jet-input id="years" type="number" class="mt-1 block w-full" wire:model.lazy="years"/>
                                <x-jet-input-error for="years" class="mt-2" />
                            </div>

                            @foreach ($surcharges as $surcharge)
                                <div class="col-span-6 sm:col-span-4" x-data="{ show_surcharge_{{ $surcharge->id }}: {{ $calc_surcharges[$surcharge->id] }} }">
                                    <div class="grid grid-cols-3 gap-3">
                                        <div class="col-span-3 sm:col-span-1">
                                            <x-jet-label value="{{ $surcharge->name }}" />
                                            <label for="surcharge_{{ $surcharge->id }}" class="flex items-center">
                                                <input id="surcharge_{{ $surcharge->id }}" x-model="show_surcharge_{{ $surcharge->id }}" type="checkbox" class="form-checkbox" wire:model.lazy="calc_surcharges.{{ $surcharge->id }}">
                                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Yes') }}</span>
                                            </label>
                                        </div>
                                        @if($surcharge->type == 'unit')
                                            <div class="col-span-3 sm:col-span-1" x-show="show_surcharge_{{ $surcharge->id }}">
                                                <x-jet-label value="{{ __('Quantity') }}" />
                                                <x-jet-input type="number" class="mt-1 block w-full" wire:model.lazy="calc_surcharges_qty.{{ $surcharge->id }}" />
                                                <x-jet-input-error for="calc_surcharges_qty.{{ $surcharge->id }}" class="mt-2" />
                                            </div>
                                        @endif
                                    </div>
                                    <x-jet-input-error for="calc_surcharges.{{ $surcharge->id }}" class="mt-2" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-jet-section-border />

    <div class="grid grid-cols-3 gap-6">
        @if($this->calculator->module1)
            <div class="col-span-3 sm:col-span-1">
                <label for="selected_module1" class="flex items-center p-3 rounded-lg cursor-pointer {{ $selected_module == 1 ? 'bg-green-600' : '' }}"">
                    <input type="radio" wire:model="selected_module" name="selected_module" value="1" id="selected_module1" class="hidden">
                    <div class="col-span-3 sm:col-span-1 w-full bg-gray-400 p-4 rounded-sm">
                        <p>{{ $this->calculator->module1->name }}</p>
                        @if($this->calculator->module1->file_name)
                            <img src="{{ asset('storage/photos/' . $this->calculator->module1->file_name) }}" class="w-full h-auto mb-2">
                        @endif
                    </div>
                </label>
            </div>
        @endif

        @if($this->calculator->module2)
            <div class="col-span-3 sm:col-span-1">
                <label for="selected_module2" class="flex items-center p-3 rounded-lg cursor-pointer {{ $selected_module == 2 ? 'bg-green-600' : '' }}"">
                    <input type="radio" wire:model="selected_module" name="selected_module" value="2" id="selected_module2" class="hidden">
                    <div class="col-span-3 sm:col-span-1 w-full bg-gray-400 p-4 rounded-sm">
                        <p>{{ $this->calculator->module2->name }}</p>
                        @if($this->calculator->module2->file_name)
                            <img src="{{ asset('storage/photos/' . $this->calculator->module2->file_name) }}" class="w-full h-auto mb-2">
                        @endif
                    </div>
                </label>
            </div>
        @endif

        @if($this->calculator->module3)
            <div class="col-span-3 sm:col-span-1">
                <label for="selected_module3" class="flex items-center">
                    <input type="radio" wire:model="selected_module" name="selected_module" value="3" id="selected_module3">
                    <div class="col-span-3 sm:col-span-1">
                        <p>{{ $this->calculator->module3->name }}</p>
                    </div>
                </label>
            </div>
        @endif
    </div>

    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-gray-800 text-right sm:px-6 mt-10">
        <x-jet-action-message class="mr-3 text-white bg-green-200 p-2 rounded" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
    </div>
</form>
