<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-start flex-wrap">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-400 leading-tight mr-4">
                {{ __('Edycja modułu') }}
            </h2>

            @if(!$module->trashed())
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
            <livewire:modules.edit :module="$module"/>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <x-jet-section-title>
                    <x-slot name="title">Cenniki</x-slot>
                    <x-slot name="description">Tutaj możesz podejrzeć lub wgrać nowy cennik</x-slot>
                </x-jet-section-title>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="grid grid-cols-6 gap-6">
                        <livewire:modules.price-lists :opt="0" :module="$module" :key="opt-off"/>
                        <livewire:modules.price-lists :opt="1" :module="$module" :key="opt-on"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
