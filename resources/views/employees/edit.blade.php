<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-start flex-wrap">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-400 leading-tight mr-4">
                {{ __('Edycja przedstawiciela') }}
            </h2>

            @if(!$employee->trashed())
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    Aktywny
                </span>
            @else
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                    Nie aktywny
                </span>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:employees.edit :id="$employee->id"/>
        </div>
    </div>
</x-app-layout>