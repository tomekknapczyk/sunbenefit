<div>
    <x-table>
        <x-slot name="thead">
            <tr>
                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    Kod
                </th>
                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    Imię i nazwisko /<br>
                    Adres inwestycji
                </th>
                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    Instalacja
                </th>
                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    Status
                </th>
                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800 max-w-xs"></th>
            </tr>
        </x-slot>

        <x-slot name="tbody">
            @foreach($calculations as $calculation)
                <tr class="text-sm text-gray-900 dark:text-gray-400">
                    <td class="px-6 py-4 ">
                        <p>{{ $calculation->code }}</p>
                    </td>
                    <td class="px-6 py-4 ">
                        <p>{{ $calculation->name }}</p>
                        <p class="text-xs">{{ $calculation->invest_address }}</p>
                        <p class="text-xs">{{ $calculation->invest_zip_code }} {{ $calculation->invest_city }}</p>
                    </td>
                    <td class="px-6 py-4">
                        <p>{{ $calculation->module_name }} x {{ $calculation->module_qty }} szt.</p>
                        <p>{{ $calculation->module_power }} kW</p>
                    </td>
                    <td class="px-6 py-4">
                        <p>{{ $calculation->status }}</p>
                        <p>{{ $calculation->created_at->format('d.m.Y') }} ({{ $calculation->user->name }})</p>
                    </td>
                    <td class="px-6 py-4 text-right text-sm leading-5 font-medium max-w-xs">
                        @if($calculation->getRawOriginal('status') == 1)
                            <a href="{{ route('edit_calculation', $calculation) }}" class="ml-2 mb-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                                Edytuj
                            </a>

                            <a href="{{ route('edit_calculation_aum', $calculation) }}" class="ml-2 mb-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                                Edytuj Aum
                            </a>
                            @if($calculation->user_id == auth()->user()->id)
                                <x-jet-danger-button class="ml-2" wire:click="confirmDeleteCalculation({{ $calculation->id }})" wire:loading.attr="disabled">
                                    {{ __('Delete') }}
                                </x-jet-danger-button>
                            @endif
                        @endif
                    </td>
                </tr>
                <tr class="bg-gray-300 dark:bg-gray-600">
                    <td colspan="5">
                        <div class="p-1 space-x-1 text-right">
                            <a href="{{ route('getAgreement', $calculation->code_slug().'.pdf') }}" target="_blank" class="inline-flex items-center px-2 py-1 bg-gray-200 dark:bg-gray-800 border border-transparent rounded-md text-xs text-black dark:text-gray-200 hover:bg-gray-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                                Umowa
                            </a>

                            <a href="{{ route('getDesc', $calculation->code_slug().'.pdf') }}" target="_blank" class="inline-flex items-center px-2 py-1 bg-gray-200 dark:bg-gray-800 border border-transparent rounded-md text-xs text-black dark:text-gray-200 hover:bg-gray-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                                Opis Techniczny
                            </a>

                            <a href="{{ route('getAum', $calculation->code_slug().'.pdf') }}" target="_blank" class="inline-flex items-center px-2 py-1 bg-gray-200 dark:bg-gray-800 border border-transparent rounded-md text-xs text-black dark:text-gray-200 hover:bg-gray-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                                AUM
                            </a>

                            <a href="{{ route('getProtocol', $calculation->code_slug().'.pdf') }}" target="_blank" class="inline-flex items-center px-2 py-1 bg-gray-200 dark:bg-gray-800 border border-transparent rounded-md text-xs text-black dark:text-gray-200 hover:bg-gray-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                                Protokół Odbioru
                            </a>

                            @foreach ($attachments as $attachment)
                                <a href="{{ route('getAttachment', $attachment->file_name) }}"" target="_blank" class="inline-flex items-center px-2 py-1 bg-gray-200 dark:bg-gray-800 border border-transparent rounded-md text-xs text-black dark:text-gray-200 hover:bg-gray-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                                    {{ $attachment->name }}
                                </a>
                            @endforeach
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-table>

    <x-jet-action-message class="text-white bg-red-400 p-2 rounded-b" on="deleteError">
        {{ __('Nie można usunąć wybranej wyceny.') }}
    </x-jet-action-message>

    <!-- Change Module Status Modal -->
    <x-jet-dialog-modal id="deleteCalculationModal" wire:model="deleteCalculation">
        <x-slot name="title">
            @if(isset($selectedCalculation))
                {{ __('Delete') }}
                <p class="text-gray-500 text-sm">{{ $selectedCalculation->code }}</p>
            @endif
        </x-slot>

        <x-slot name="content">
            @if(isset($selectedCalculation))
                {{ __('Czy na pewno chcesz usunąć tę wycenę?') }}
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('deleteCalculation')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            @if(isset($selectedCalculation))
                <x-jet-danger-button class="ml-2" wire:click="deleteCalculation" wire:loading.attr="disabled">
                    {{ __('Delete') }}
                </x-jet-danger-button>
            @endif
        </x-slot>
    </x-jet-dialog-modal>
</div>