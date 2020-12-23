<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between flex-wrap">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-400 leading-tight">
                {{ __('Calculator configuration') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:employees.calculator :modules="$modules"/>

            <x-jet-section-border />

            <div class="mt-10 sm:mt-0">
                <livewire:employees.surcharges :surcharges="$surcharges"/>
            </div>

            <x-jet-section-border />

            <div class="mt-10 sm:mt-0">
                <livewire:employees.factors :factors="$factors"/>
            </div>
        </div>
    </div>
</x-app-layout>