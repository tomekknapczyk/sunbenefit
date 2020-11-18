<div>
    <form wire:submit.prevent="save">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-4 bg-white">
                @if($module->file_name)
                    <img src="{{ asset('storage/photos/' . $module->file_name) }}" class="w-full h-auto mb-2">
                @endif

                <div>
                    <input type="file" wire:model="photo">
                    
                    @error('photo') <span class="error">{{ $message }}</span> @enderror

                    <div wire:loading wire:target="photo">Wysyłam...</div>
                </div>
            </div>

            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                <x-jet-action-message class="mr-3 text-white bg-green-200 p-2 rounded" on="saved_photo">
                    {{ __('Saved.') }}
                </x-jet-action-message>
        
                <x-jet-button wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-jet-button>
            </div>
        </div>
    </form>
</div>