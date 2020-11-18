<div class="col-span-6 sm:col-span-3">
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-2 py-3 sm:px-3 bg-white">
            @if($opt)
                <p class="text-lg font-bold">Z optymalizacją</p>
            @else
                <p class="text-lg font-bold">Bez optymalizacji</p>
            @endif
            <div class="flex items-center mt-2">
                <x-heroicon-o-clipboard-list class="w-12 h-12 mr-2"/>
                @if($priceList)
                    <p class="text-sm text-gray-400">
                        {{ $priceList->updated_at->format('d-m-Y H:i:s') }}
                    </p>
                @else
                    <p class="text-sm text-red-700 font-bold">
                        Brak cennika
                    </p>
                @endif
            </div>
        </div>
        <div class="flex items-center justify-end flex-wrap px-2 py-3 bg-gray-50 text-right sm:px-3">
            @if($priceList)
                <x-jet-button class="ml-2" wire:click="showList()" wire:loading.attr="disabled">
                    {{ __('Preview') }}
                </x-jet-button>
            @endif

            <x-jet-button class="ml-2" wire:click="confirmUploadList()" wire:loading.attr="disabled">
                {{ __('Change') }}
            </x-jet-button>
        </div>
    </div>


    <!-- Change Module Status Modal -->
    <x-jet-dialog-modal id="uploadModal_{{ $opt }}" wire:model="uploadList">
        <x-slot name="title">
            {{ __('Wgraj nowy cennik') }}

            @if($opt)
                <p class="text-gray-500 text-sm">z optymalizacją</p>
            @else
                <p class="text-gray-500 text-sm">bez optymalizacji</p>
            @endif
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <div
                    x-data="{ isUploading: false, progress: 0 }"
                    x-on:livewire-upload-start="isUploading = true"
                    x-on:livewire-upload-finish="isUploading = false"
                    x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                >
                    <input type="file" wire:model="cennik" id="cennik" class="mt-1 block w-full" >
                    <x-jet-input-error for="cennik" class="mt-2" />

                    <!-- Progress Bar -->
                    <div x-show="isUploading">
                        <progress max="100" x-bind:value="progress"></progress>
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('uploadList')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="savePriceList" wire:loading.attr="disabled">
                {{ __('Upload') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <!-- Change Module Status Modal -->
    <x-jet-dialog-modal id="showModal_{{ $opt }}" wire:model="showList">
        <x-slot name="title">
            {{ __('Cennik') }}

            @if($opt)
                <p class="text-gray-500 text-sm">z optymalizacją</p>
            @else
                <p class="text-gray-500 text-sm">bez optymalizacji</p>
            @endif
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                @if($priceTable)
                <x-table>
                    <x-slot name="thead">
                        <tr>
                            @foreach($groups as $group)
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Grupa {{ $group->name }}
                                </th>
                            @endforeach
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Moc
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Ilość
                            </th>
                        </tr>
                    </x-slot>
            
                    <x-slot name="tbody">
                        @foreach($priceTable as $key => $price)
                            <tr>
                                @foreach($groups as $group)
                                    <td class="px-6 py-2 whitespace-no-wrap text-xs">
                                        {{ $price['price_'.$group->name] }}
                                    </td>
                                @endforeach
                                <td class="px-6 py-2 whitespace-no-wrap text-xs">
                                    {{ $price['power'] }}
                                </td>
                                <td class="px-6 py-2 whitespace-no-wrap text-xs">
                                    {{ $price['qty'] }}
                                </td>
                            </tr>
                        @endforeach
                    </x-slot>
                </x-table>
                @endif
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('showList')" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>