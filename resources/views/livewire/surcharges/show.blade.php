<div>
    <x-table>
        <x-slot name="thead">
            <tr>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Nazwa
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Cena
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Typ
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Edytowalna przez pracownika
                </th>
                <th class="px-6 py-3 bg-gray-50"></th>
            </tr>
        </x-slot>

        <x-slot name="tbody">
            @foreach($surcharges as $surcharge)
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-gray-900">{{ $surcharge->name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-gray-900">{{ $surcharge->price }}<div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-gray-900">{{ $surcharge->getType() }}<div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-gray-900">@if($surcharge->editable) {{ __('Yes') }} @else {{ __('No') }} @endif<div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                        <a href="{{ route('edit_surcharge', $surcharge->id) }}" class="ml-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                            Edytuj
                        </a>
                        <x-jet-danger-button class="ml-2" wire:click="confirmDeleteSurcharge({{ $surcharge->id }})" wire:loading.attr="disabled">
                            {{ __('Delete') }}
                        </x-jet-danger-button>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-table>

    <!-- Change Module Status Modal -->
    <x-jet-dialog-modal id="deleteSurchargeModal" wire:model="deleteSurcharge">
        <x-slot name="title">
            @if(isset($selectedSurcharge))
                {{ __('Delete') }}
                <p class="text-gray-500 text-sm">{{ $selectedSurcharge->name }} | {{ $selectedSurcharge->price }}</p>
            @endif
        </x-slot>

        <x-slot name="content">
            @if(isset($selectedSurcharge))
                {{ __('Czy na pewno chcesz usunąć tę dopłatę?') }}
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('deleteSurcharge')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            @if(isset($selectedSurcharge))
                <x-jet-danger-button class="ml-2" wire:click="deleteSurcharge" wire:loading.attr="disabled">
                    {{ __('Delete') }}
                </x-jet-danger-button>
            @endif
        </x-slot>
    </x-jet-dialog-modal>
</div>