<div class="md:grid md:grid-cols-3 md:gap-6">
    <x-jet-section-title>
        <x-slot name="title">Dopłaty</x-slot>
        <x-slot name="description">Tu możesz ustawić kwoty dopłat za poszczególne elementy</x-slot>
    </x-jet-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white dark:bg-gray-900 sm:p-6">
                @foreach ($surcharges as $surcharge)
                    <livewire:employees.surcharge :surcharge="$surcharge"/>
                    @if(!$loop->last)
                        <x-jet-section-border />
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>