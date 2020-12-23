<div>
    <form wire:submit.prevent="saveCalculation" x-data="{ dane: true, same: $wire.samePlace, kalkulacja: false, additional: false, settings: false, compare: false, solar: $wire.solar, podsumowanie: false, selected: $wire.selectedModule, finalPrice: false }">
        <div x-show="dane" class="max-w-7xl mx-auto" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <x-jet-section-title>
                    <x-slot name="title">Dane inwestora</x-slot>
                    <x-slot name="description">
                        Uzupełnij dane inwestora
                        <button @click.prevent="same = !same"
                            wire:click="changeSamePlace"
                            :class="{'dark:bg-yellow-400 bg-yellow-400 hover:bg-yellow-500 dark:hover:bg-yellow-500': !same }"
                            type="submit"
                            class="inline-flex items-center px-4 mt-4 py-2 bg-gray-800 dark:bg-gray-600 dark:hover:bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150'])">
                            Inne dane miejsca inwestycji
                        </button>
                    </x-slot>
                </x-jet-section-title>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white dark:bg-gray-900 sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                {{-- company or privately --}}
                                <div class="col-span-6">
                                    <x-jet-label value="{{ __('Company') }}" />
                                    <label for="company" class="flex items-center" wire:click="updateCompany">
                                        <input id="company"
                                            type="checkbox"
                                            class="form-checkbox"
                                            wire:model="company"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Yes') }}</span>
                                    </label>
                                </div>

                                <!-- Name -->
                                <div class="col-span-6 sm:col-span-3">
                                    <x-jet-label for="name" value="{{ __('First Name') }} {{ __('Lastname') }} / {{ __('Company') }}" />
                                    <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name" autocomplete="name" />
                                    <x-jet-input-error for="name" class="mt-2" />
                                </div>

                                <!-- Nip -->
                                <div class="col-span-6 sm:col-span-3">
                                    <x-jet-label for="nip" value="{{ __('Nip') }} ({{ __('Optional') }})" />
                                    <x-jet-input id="nip" type="text" class="mt-1 block w-full" wire:model.defer="nip" autocomplete="nip" />
                                    <x-jet-input-error for="nip" class="mt-2" />
                                </div>

                                <!-- Address -->
                                <div class="col-span-6 sm:col-span-2">
                                    <x-jet-label for="address" value="{{ __('Address') }}" />
                                    <x-jet-input id="address" type="text" class="mt-1 block w-full" wire:model="address" autocomplete="address"  wire:keyup.debounce.150ms="changeAddress" />
                                    <x-jet-input-error for="address" class="mt-2" />
                                </div>

                                <!-- Zip code -->
                                <div class="col-span-6 sm:col-span-2">
                                    <x-jet-label for="zipCode" value="{{ __('Zip code') }}" />
                                    <x-jet-input id="zipCode" type="text" class="mt-1 block w-full" wire:model="zipCode" autocomplete="zip_code"  wire:keyup.debounce.150ms="changeZipCode" />
                                    <x-jet-input-error for="zipCode" class="mt-2" />
                                </div>

                                <!-- City -->
                                <div class="col-span-6 sm:col-span-2">
                                    <x-jet-label for="city" value="{{ __('City') }}" />
                                    <x-jet-input id="city" type="text" class="mt-1 block w-full" wire:model="city" autocomplete="city"  wire:keyup.debounce.150ms="changeCity" />
                                    <x-jet-input-error for="city" class="mt-2" />
                                </div>

                                <!-- Phone -->
                                <div class="col-span-6 sm:col-span-3">
                                    <x-jet-label for="phone" value="{{ __('Phone') }}" />
                                    <x-jet-input id="phone" type="text" class="mt-1 block w-full" wire:model.defer="phone" autocomplete="phone" />
                                    <x-jet-input-error for="phone" class="mt-2" />
                                </div>

                                <!-- Email -->
                                <div class="col-span-6 sm:col-span-3">
                                    <x-jet-label for="email" value="{{ __('Email') }}" />
                                    <x-jet-input id="email" type="text" class="mt-1 block w-full" wire:model.defer="email" autocomplete="email" />
                                    <x-jet-input-error for="email" class="mt-2" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div x-show="!same" style="display: none;"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100">
                <x-jet-section-border />

                <div>
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
                                            <x-jet-label for="investAddress" value="{{ __('Address') }}" />
                                            <x-jet-input id="investAddress" type="text" class="mt-1 block w-full" wire:model.defer="investAddress" />
                                            <x-jet-input-error for="investAddress" class="mt-2" />
                                        </div>

                                        <!-- Invest Zip code -->
                                        <div class="col-span-6 sm:col-span-2">
                                            <x-jet-label for="investZipCode" value="{{ __('Zip code') }}" />
                                            <x-jet-input id="investZipCode" type="text" class="mt-1 block w-full" wire:model.defer="investZipCode" />
                                            <x-jet-input-error for="investZipCode" class="mt-2" />
                                        </div>

                                        <!-- Invest City -->
                                        <div class="col-span-6 sm:col-span-2">
                                            <x-jet-label for="investCity" value="{{ __('City') }}" />
                                            <x-jet-input id="investCity" type="text" class="mt-1 block w-full" wire:model.defer="investCity" />
                                            <x-jet-input-error for="investCity" class="mt-2" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="kalkulacja" style="display: none"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100">
            <div>
                <div class="grid xl:grid-cols-12 md:gap-6">        
                    <div class="sm:col-span-3 xl:col-span-5">
                        <div class="shadow overflow-hidden sm:rounded-md h-full">
                            <div class="bg-white dark:bg-gray-900 p-4 2xl:p-6 h-full relative">
                                <button @click.prevent="settings = !settings"
                                    :class="{'dark:bg-yellow-400 bg-yellow-400 hover:bg-yellow-500 dark:hover:bg-yellow-500': settings }"
                                    type="submit"
                                    class="absolute top-0 mt-1 right-0 mr-1 inline-flex items-center px-1 py-1 opacity-25 hover:opacity-100 bg-gray-800 dark:bg-gray-600 dark:hover:bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150'])">
                                    <x-heroicon-o-adjustments class="w-4 h-4"/>
                                </button>
                                <div class="grid grid-cols-6 gap-4 2xl:gap-6">
                                    <!-- Yearly Consumption -->
                                    <div class="col-span-6 sm:col-span-3">
                                        <x-jet-label for="consumption" value="{{ __('Yearly Consumption') }}" />
                                        <x-jet-input id="consumption" type="number" step=".01" class="mt-1 block w-full" wire:model="consumption" wire:keyup.debounce.100ms='calcFees'/>
                                        <x-jet-input-error for="consumption" class="mt-2" />
                                    </div>

                                    <!-- Monthly fees -->
                                    <div class="col-span-6 sm:col-span-3">
                                        <x-jet-label for="fees" value="{{ __('Monthly fees') }}" />
                                        <x-jet-input id="fees" type="number" step=".01" class="mt-1 block w-full" wire:model="fees" wire:keyup.debounce.100ms='calcConsumption'/>
                                        <x-jet-input-error for="fees" class="mt-2" />
                                    </div>

                                    <!-- PV power -->
                                    <div class="col-span-6 sm:col-span-3">
                                        <x-jet-label for="pvPower" value="{{ __('PV power') }}" />
                                        <x-jet-input id="pvPower" type="number" step=".01" class="mt-1 block w-full" wire:model="pvPower" wire:keyup.debounce.100ms='calcPrice'/>
                                        <x-jet-input-error for="pvPower" class="mt-2" />
                                    </div>

                                    <!-- Perfect PV power -->
                                    <div class="col-span-6 sm:col-span-3">
                                        <x-jet-label value="{{ __('Perfect PV power') }}" />
                                        <p class="text-4xl text-green-500 font-bold">{{ $this->perfectPower }} kWp</p>
                                    </div>
                                </div>

                                <x-jet-section-border />

                                <div class="grid grid-cols-6 gap-6">
                                    <!-- Self deposit -->
                                    <div class="col-span-6 sm:col-span-3">
                                        <x-jet-label for="deposit" value="{{ __('Self deposit') }}" />
                                        <x-jet-input id="deposit" type="number" class="mt-1 block w-full" wire:model="deposit" wire:keyup.debounce.100ms='calcDeposit'/>
                                        <x-jet-input-error for="deposit" class="mt-2" />
                                    </div>

                                    <!-- Number of years -->
                                    <div class="col-span-6 sm:col-span-3">
                                        <x-jet-label for="years" value="{{ __('Number of years') }}" />
                                        <x-jet-input id="years" type="number" class="mt-1 block w-full" wire:model="years" wire:keyup.debounce.100ms='calcYears'/>
                                        <x-jet-input-error for="years" class="mt-2" />
                                    </div>
                                </div>

                                <x-jet-section-border />

                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                    <button @click.prevent="additional = !additional"
                                        :class="{'dark:bg-yellow-400 bg-yellow-400 hover:bg-yellow-500 dark:hover:bg-yellow-500': additional }"
                                        type="submit"
                                        class="inline-flex items-center justify-center text-center p-2 bg-gray-800 dark:bg-gray-600 dark:hover:bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150'])">
                                        <x-heroicon-o-adjustments class="w-4 h-4 mr-1 flex-shrink-0"/> Dodatkowe opcje
                                    </button>

                                    <button @click.prevent="compare = !compare"
                                        :class="{'dark:bg-yellow-400 bg-yellow-400 hover:bg-yellow-500 dark:hover:bg-yellow-500': compare }"
                                        type="submit"
                                        class="inline-flex items-center justify-center text-center p-2 bg-gray-800 dark:bg-gray-600 dark:hover:bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150'])">
                                        <x-heroicon-o-presentation-chart-line class="w-4 h-4 mr-1 flex-shrink-0"/> Porównanie
                                    </button>

                                    <button @click.prevent="solar = !solar"
                                        wire:click='calcSolar'
                                        :class="{'dark:bg-purple-500 bg-purple-500 hover:bg-purple-500 dark:hover:bg-purple-500': solar }"
                                        type="submit"
                                        class="inline-flex items-center justify-center text-center p-2 bg-gray-800 dark:bg-gray-600 dark:hover:bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150'])">
                                        <x-heroicon-o-device-mobile class="w-4 h-4 mr-1 flex-shrink-0"/> Solar Edge
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 md:mt-0 sm:col-span-3 xl:col-span-3">
                        <livewire:calculations.discount />
                    </div>

                    <div class="mt-5 md:mt-0 sm:col-span-3 xl:col-span-4 relative flex flex-col items-center justify-center">
                        <livewire:calculations.chart :consumption="$consumption" :pvPower="$pvPower"/>

                        <div x-show="$wire.pvPower >= 6.5" style="display: none" >
                            <x-jet-section-border />

                            <p class="bg-red-500 text-white text-sm flex items-center justify-center p-2 font-semibold shadow-lg">
                                <x-heroicon-o-fire class="w-8 h-8 mr-2"/>
                                Uzgodnienia PPOŻ - {{ $ppoz }} zł
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <livewire:calculations.compare :module1="$this->calculator->module1" :module2="$this->calculator->module2" :module3="$this->calculator->module3"/>

            <x-jet-section-border />

            <div class="grid grid-cols-3 gap-6">
                @if($this->calculator->module1)
                    <div class="col-span-3 lg:col-span-1">
                        <label for="selected_module1"
                            @click="selected = 1"
                            class="flex items-stretch rounded-lg cursor-pointer border-4 border-transparent {{ $selectedModule == $this->calculator->module1->id ? ' border-green-500 bg-white dark:bg-gray-900 shadow-lg' : '' }}"
                        >
                            <input type="radio" wire:model="selectedModule" name="selectedModule" value="{{ $this->calculator->module1->id }}" id="selected_module1" class="hidden" >
                            <livewire:calculations.module
                                :module="$this->calculator->module1"
                                :margin="$this->calculator->margin_1"
                                :ppoz="$ppoz"
                                :nr="$this->calculator->module1->id"
                                :options="$options"
                                :pvPower="$pvPower"
                                :company="$company"
                                :deposit="$deposit"
                                :years="$years"
                                :solar="$solar"
                                :surcharges="$surcharges"
                                :calcSurcharges="$calcSurcharges"
                                :calcSurchargesQty="$calcSurchargesQty"
                            />
                        </label>
                    </div>
                @endif

                @if($this->calculator->module2)
                    <div class="col-span-3 lg:col-span-1">
                        <label for="selected_module2"
                            @click="selected = 2"
                            class="flex items-stretch rounded-lg cursor-pointer border-4 border-transparent {{ $selectedModule == $this->calculator->module2->id ? 'border-green-500 bg-white dark:bg-gray-900 shadow-lg' : '' }}"
                        >
                            <input type="radio" wire:model="selectedModule" name="selectedModule" value="{{ $this->calculator->module2->id }}" id="selected_module2" class="hidden" >
                            <livewire:calculations.module
                                :module="$this->calculator->module2"
                                :margin="$this->calculator->margin_2"
                                :ppoz="$ppoz"
                                :nr="$this->calculator->module2->id"
                                :options="$options"
                                :pvPower="$pvPower"
                                :company="$company"
                                :deposit="$deposit"
                                :years="$years"
                                :solar="$solar"
                                :surcharges="$surcharges"
                                :calcSurcharges="$calcSurcharges"
                                :calcSurchargesQty="$calcSurchargesQty"
                            />
                        </label>
                    </div>
                @endif

                @if($this->calculator->module3)
                    <div class="col-span-3 lg:col-span-1">
                        <label for="selected_module3"
                            @click="selected = 3"
                            class="flex items-stretch rounded-lg cursor-pointer border-4 border-transparent {{ $selectedModule == $this->calculator->module3->id ? 'border-green-500 bg-white dark:bg-gray-900 shadow-lg' : '' }}"
                        >
                            <input type="radio" wire:model="selectedModule" name="selectedModule" value="{{ $this->calculator->module3->id }}" id="selected_module3" class="hidden" >
                            <livewire:calculations.module
                                :module="$this->calculator->module3"
                                :margin="$this->calculator->margin_3"
                                :ppoz="$ppoz"
                                :nr="$this->calculator->module3->id"
                                :options="$options"
                                :pvPower="$pvPower"
                                :company="$company"
                                :deposit="$deposit"
                                :years="$years"
                                :solar="$solar"
                                :surcharges="$surcharges"
                                :calcSurcharges="$calcSurcharges"
                                :calcSurchargesQty="$calcSurchargesQty"
                            />
                        </label>
                    </div>
                @endif
            </div>

            <x-modal var="additional">
                <x-slot name="title">Dodatkowe opcje</x-slot>
                <x-slot name="content">
                    @foreach ($surcharges as $surcharge)
                        <div>
                            <div class="grid grid-cols-6 gap-3">
                                <div class="col-span-2 sm:col-span-2">
                                    <x-jet-label value="{{ $surcharge->name }}" />
                                    <label for="surcharge_{{ $surcharge->id }}" class="flex items-center">
                                        <input id="surcharge_{{ $surcharge->id }}"
                                            type="checkbox"
                                            class="form-checkbox"
                                            wire:model="calcSurcharges.{{ $surcharge->id }}"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Yes') }}</span>
                                    </label>
                                </div>
                                @if($surcharge->type == 'unit')
                                    <div class="col-span-2 sm:col-span-1">
                                        <x-jet-label value="{{ __('Quantity') }}" />
                                        <x-jet-input type="number"
                                            class="mt-1 block w-full"
                                            wire:model="calcSurchargesQty.{{ $surcharge->id }}"
                                        />
                                        <x-jet-input-error for="calcSurchargesQty.{{ $surcharge->id }}" class="mt-2" />
                                    </div>
                                @endif
                            </div>
                            <x-jet-input-error for="calc_surcharges.{{ $surcharge->id }}" class="mt-2" />
                        </div>
                        <x-jet-section-border />
                    @endforeach

                    <div class="flex items-center justify-end">
                        <div class="flex items-center justify-end">
                            <x-jet-action-message class="mr-3 text-white bg-green-200 p-2 rounded" on="applied">
                                {{ __('Saved.') }}
                            </x-jet-action-message>
                
                            <x-jet-button wire:loading.attr="disabled" wire:click.prevent='calcSurcharges'>
                                {{ __('Apply') }}
                            </x-jet-button>
                        </div>
                    </div>
                </x-slot>
            </x-modal>

            <x-modal var="settings" maxWidth="sm">
                <x-slot name="title">Ustawienia kalkulatora</x-slot>
                <x-slot name="content">
                    <div class="grid grid-cols-1 gap-3">
                        <div>
                            <x-jet-label for="powerPrice" value="Cena prądu" />
                            <x-jet-input name="powerPrice" id="powerPrice" type="number" step=".01" class="mt-1 block w-full" wire:model="powerPrice" wire:keyup.debounce.150ms="calcConsumption" />
                            <x-jet-input-error for="powerPrice" class="mt-2" />
                        </div>
            
                        <div>
                            <x-jet-label for="perfect" value="Współczynnik idealnej mocy PV" />
                            <x-jet-input name="perfect" id="perfect" type="number" step=".01" class="mt-1 block w-full" wire:model="perfect" />
                            <x-jet-input-error for="perfect" class="mt-2" />
                        </div>
                    </div>
                </x-slot>
            </x-modal>
        </div>

        <div x-show="podsumowanie" class="max-w-7xl mx-auto" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            style="display: none;">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <x-jet-section-title>
                    <x-slot name="title">Podsumowanie</x-slot>
                    <x-slot name="description"></x-slot>
                </x-jet-section-title>

                <div class="mt-5 md:mt-0 md:col-span-2" >
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white dark:bg-gray-900 sm:p-6">
                            <div class="grid grid-cols-6 gap-6 text-gray-900 dark:text-gray-100 items-center">
                                <div class="col-span-2">
                                    <p class="text-lg">{{ __('Name') }}</p>
                                </div>
                                <div class="col-span-4">
                                    <p class="text-xl" x-text="$wire.selectedName"></p>
                                </div>
                                <div class="col-span-2">
                                    <p class="text-lg">{{ __('Power') }}</p>
                                </div>
                                <div class="col-span-4">
                                    <p class="text-xl"><span x-text="$wire.selectedKwp"></span> kW</p>
                                </div>
                                <div class="col-span-2">
                                    <p class="text-lg">{{ __('Quantity') }}</p>
                                </div>
                                <div class="col-span-4">
                                    <p class="text-xl"><span x-text="$wire.selectedQty"></span> szt.</p>
                                </div>
                                <div class="col-span-2">
                                    <p class="text-lg">{{ __('Price') }}</p>
                                </div>
                                <div class="col-span-4 relative">
                                    <div x-show="!finalPrice" class="flex items-center">
                                        <p class="text-xl"><span x-text="$wire.selectedPrice"></span> zł</p>
                                        <button @click.prevent="finalPrice = !finalPrice"
                                            class="absolute top-0 mt-1 right-0 mr-1 inline-flex items-center px-1 py-1 opacity-25 hover:opacity-100 bg-gray-800 dark:bg-gray-600 dark:hover:bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150'])">
                                            <x-heroicon-o-adjustments class="w-4 h-4"/>
                                        </button>
                                    </div>
                                    <div x-show="finalPrice" style="display: none" class="flex items-center">
                                        <x-jet-input id="selectedPrice" type="text" class="block w-1/3 text-xl" wire:model="selectedPrice"/>
                                        <span class="ml-2">zł</span>
                                    </div>
                                </div>
                                <div class="col-span-2">
                                    <p class="text-lg">{{ __('Self deposit') }}</p>
                                </div>
                                <div class="col-span-4">
                                    <p class="text-xl"><span x-text="$wire.deposit"></span> zł</p>
                                </div>
                                <div class="col-span-2">
                                    <p class="text-lg">{{ __('Financing method') }}</p>
                                </div>
                                <div class="col-span-4">
                                    <div class="grid grid-cols-6 gap-2 items-center">
                                        <div class="col-span-6 lg:col-span-2">
                                            <label for="kredyt">
                                                <input type="radio" wire:model.defer="financingMethod" name="financingMethod" value="kredyt" id="kredyt" >
                                                Kredyt
                                            </label>
                                        </div>

                                        <div class="col-span-6 lg:col-span-2">
                                            <label for="leasing">
                                                <input type="radio" wire:model.defer="financingMethod" name="financingMethod" value="leasing" id="leasing" >
                                                Leasing
                                            </label>
                                        </div>

                                        <div class="col-span-6 lg:col-span-2">
                                            <label for="cash">
                                                <input type="radio" wire:model.defer="financingMethod" name="financingMethod" value="gotówka" id="cash" >
                                                Gotówka
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center jutify-start sm:justify-between flex-col sm:flex-row flex-wrap px-4 py-3 bg-gray-200 dark:bg-gray-800 text-right sm:px-6 mt-10">
            <div class="flex items-center jutify-start sm:justify-end flex-col sm:flex-row flex-wrap mb-2 sm:mb-0">
                <button @click.prevent="dane = true;kalkulacja = false;podsumowanie = false"
                    :class="{'dark:bg-blue-500 bg-blue-500 hover:bg-blue-600': dane }"
                    type="submit"
                    class="sm:mr-5 mb-2 sm:mb-0 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150'])">
                    Dane inwestora
                </button>

                <button @click.prevent="dane = false;kalkulacja = true;podsumowanie = false"
                    :class="{'dark:bg-blue-500 bg-blue-500 hover:bg-blue-600': kalkulacja }"
                    type="submit"
                    class="sm:mr-5 mb-2 sm:mb-0 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150'])">
                    Kalkulacja
                </button>

                <button x-show="selected"
                    @click.prevent="dane = false;kalkulacja = false;podsumowanie = true;"
                    :class="{'dark:bg-blue-500 bg-blue-500 hover:bg-blue-600': podsumowanie }"
                    type="submit"
                    style="display: none;"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150'])">
                    Podsumowanie
                </button>
                
                <div wire:loading.delay class="text-gray-600 ml-4">Przeliczam...</div>
            </div>

            <div>
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <p class="text-red-500">{{ $error }}</p>
                    @endforeach
                @endif
            </div>


            <div class="flex items-center justify-end" x-show="selected" style="display: none">
                <x-jet-action-message class="mr-3 text-white bg-green-200 p-2 rounded" on="saved">
                    {{ __('Saved.') }}
                </x-jet-action-message>

                <x-jet-button wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-jet-button>
            </div>
        </div>
    </form>
</div>