<div>
    <x-table>
        <x-slot name="thead">
            <tr>
                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800"></th>
                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    Nazwa
                </th>
                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800"></th>
            </tr>
        </x-slot>

        <x-slot name="tbody">
            @foreach($attachments as $document)
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap">
                            @svg('heroicon-o-document-text', 'w-16 h-16 dark:text-gray-400')
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="text-xl leading-5 text-gray-900 dark:text-gray-400">{{ $document->name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                        <a href="{{ route('getAttachment', $document->file_name) }}" target="_blank" class="ml-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                            Pobierz
                        </a>
                        @can('delete document')
                            <x-jet-danger-button class="ml-2" wire:click="confirmDeleteDocument({{ $document->id }})" wire:loading.attr="disabled">
                                {{ __('Delete') }}
                            </x-jet-danger-button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-table>

    <!-- Change Module Status Modal -->
    <x-jet-dialog-modal id="deleteDocumentModal" wire:model="deleteDocument">
        <x-slot name="title">
            @if(isset($selectedDocument))
                {{ __('Delete') }}
                <p class="text-gray-500 text-sm">{{ $selectedDocument->name }}</p>
            @endif
        </x-slot>

        <x-slot name="content">
            @if(isset($selectedDocument))
                {{ __('Czy na pewno chcesz usunąć ten plik?') }}
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('changingStatus')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            @if(isset($selectedDocument))
                <x-jet-danger-button class="ml-2" wire:click="deleteDocument" wire:loading.attr="disabled">
                    {{ __('Delete') }}
                </x-jet-danger-button>
            @endif
        </x-slot>
    </x-jet-dialog-modal>
</div>