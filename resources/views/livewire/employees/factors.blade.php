<div class="md:grid md:grid-cols-3 md:gap-6">
    <x-jet-section-title>
        <x-slot name="title">Współczynniki</x-slot>
        <x-slot name="description">Tu możesz ustawić wartości współczynników</x-slot>
    </x-jet-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white dark:bg-gray-900 sm:p-6">
                @foreach ($factors as $factor)
                    <livewire:employees.factor :factor="$factor"/>
                    @if(!$loop->last)
                        <x-jet-section-border />
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>