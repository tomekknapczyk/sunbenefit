<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-start flex-wrap">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-400 leading-tight mr-4">
                {{ __('Edycja dopłaty') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:surcharges.edit :surcharge="$surcharge"/>
        </div>
    </div>
</x-app-layout>
