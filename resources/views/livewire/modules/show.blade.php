<div>
    <x-table>
        <x-slot name="thead">
            <tr>
                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    Nazwa
                </th>
                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    Moc
                </th>
                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    Status
                </th>
                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800"></th>
            </tr>
        </x-slot>

        <x-slot name="tbody">
            @foreach($modules as $module)
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-gray-900 dark:text-gray-400">{{ $module->name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-gray-900 dark:text-gray-400">{{ $module->power }} W<div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        @if(!$module->trashed())
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Aktywny
                            </span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                Nie aktywny
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                        <a href="{{ route('edit_module', $module['id']) }}" class="ml-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                            Edytuj
                        </a>
                        @if(!$module->trashed())
                            <x-jet-danger-button class="ml-2" wire:click="confirmChangingStatus({{ $module['id'] }})" wire:loading.attr="disabled">
                                {{ __('Deactivate') }}
                            </x-jet-danger-button>
                        @else
                            <x-jet-button class="ml-2" wire:click="confirmChangingStatus({{ $module['id'] }})" wire:loading.attr="disabled">
                                {{ __('Activate') }}
                            </x-jet-button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-table>

    <!-- Change Module Status Modal -->
    <x-jet-dialog-modal id="changingStatusModal" wire:model="changingStatus">
        <x-slot name="title">
            @if(isset($selectedModule))
                @if(!$selectedModule->trashed())
                    {{ __('Deactivate') }}
                @else
                    {{ __('Activate') }}
                @endif

                <p class="text-gray-500 text-sm">{{ $selectedModule->name }} | {{ $selectedModule->power }} kWp</p>
            @endif
        </x-slot>

        <x-slot name="content">
            @if(isset($selectedModule))
                @if(!$selectedModule->trashed())
                    {{ __('Czy na pewno chcesz wyłączyć ten moduł?') }}
                @else
                    {{ __('Czy na pewno chcesz włączyć ten moduł?') }}
                @endif
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('changingStatus')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            @if(isset($selectedModule))
                @if(!$selectedModule->trashed())
                    <x-jet-danger-button class="ml-2" wire:click="changeModuleStatus" wire:loading.attr="disabled">
                        {{ __('Deactivate') }}
                    </x-jet-danger-button>
                @else
                    <x-jet-button class="ml-2" wire:click="changeModuleStatus" wire:loading.attr="disabled">
                        {{ __('Activate') }}
                    </x-jet-button>
                @endif
            @endif
        </x-slot>
    </x-jet-dialog-modal>
</div>