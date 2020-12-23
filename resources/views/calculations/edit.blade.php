<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between flex-wrap">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-400 leading-tight">
                {{ __('Edycja wyceny') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <livewire:calculations.create
                :calculation="$calculation->id"
                :surcharges="$surcharges"
                :company="$calculation->company"
                :name="$calculation->name"
                :nip="$calculation->nip"
                :address="$calculation->address"
                :city="$calculation->city"
                :zipCode="$calculation->zip_code"
                :phone="$calculation->phone"
                :email="$calculation->email"
                :investAddress="$calculation->invest_address"
                :investZipCode="$calculation->invest_zip_code"
                :investCity="$calculation->invest_city"
                :samePlace="$calculation->same_place"
                :pvPower="$calculation->pv_power"
                :solar="$calculation->solar"
                :deposit="$calculation->deposit"
                :years="$calculation->years"
                :deposit="$calculation->deposit"
                :calcSurcharges="$calculation->calc_surcharges"
                :calcSurchargesQty="$calculation->calc_surcharges_qty"
                {{-- :selectedModule="$calculation->module_id" --}}
                :financingMethod="$calculation->financing_method"
            />
        </div>
    </div>
</x-app-layout>