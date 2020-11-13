<div class="mt-5 md:mt-0 md:col-span-2">
    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    @foreach ($groups as $group)
                        <div class="col-span-6 sm:col-span-2">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <livewire:modules.price-lista :module="$module" :group="$group" :opt="$opt" :key="$opt.'_'.$group->id"/>

                                <div class="flex items-center justify-end flex-wrap px-2 py-3 bg-gray-50 text-right sm:px-3">
                                    @if($module->priceListByName($group->name, $opt))
                                        <a href="#" class="ml-2 mb-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                                            {{ __('Preview') }}
                                        </a>
                                    @endif

                                    <x-jet-button class="ml-2 mb-2" wire:click="confirmUploadList('{{ $group->name }}')" wire:loading.attr="disabled">
                                        {{ __('Change') }}
                                    </x-jet-button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Change Module Status Modal -->
    <x-jet-dialog-modal id="uploadModal_{{ $opt }}" wire:model="uploadList">
        <x-slot name="title">
            @if(isset($selectedGroup))
                {{ __('Wgraj nowy cennik') }}

                <p class="text-gray-500 text-sm">Grupa {{ $selectedGroup }} @if($opt) z optymalizacją @endif</p>
            @endif
        </x-slot>

        <x-slot name="content">
            @if(isset($selectedGroup))
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
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('uploadList')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>
            @if(isset($selectedGroup))
                <x-jet-button class="ml-2" wire:click="savePriceList" wire:loading.attr="disabled">
                    {{ __('Upload') }}
                </x-jet-button>
            @endif
        </x-slot>
    </x-jet-dialog-modal>
</div>