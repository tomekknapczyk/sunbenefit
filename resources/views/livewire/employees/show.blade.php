<div>
    <x-table>
        <x-slot name="thead">
            <tr>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Imię i nazwisko
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Numer telefonu
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Grupa
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Status
                </th>
                <th class="px-6 py-3 bg-gray-50"></th>
            </tr>
        </x-slot>

        <x-slot name="tbody">
            @foreach($employees as $employee)
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-gray-900">{{ $employee->name }} {{ $employee->lastname }}</div>
                        <div class="text-sm leading-5 text-gray-500">{{ $employee->email }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-gray-900">{{ $employee->phone }}<div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-gray-900">{{ $employee->group->first()->name }}<div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        @if(!$employee->trashed())
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
                        <x-jet-button class="ml-2" wire:click="confirmChangingGroup({{ $employee['id'] }})" wire:loading.attr="disabled">
                            {{ __('Change group') }}
                        </x-jet-button>
                        @if(!$employee->trashed())
                        <x-jet-danger-button class="ml-2" wire:click="confirmChangingStatus({{ $employee['id'] }})" wire:loading.attr="disabled">
                            {{ __('Deactivate Account') }}
                        </x-jet-danger-button>
                        @else
                        <x-jet-button class="ml-2" wire:click="confirmChangingStatus({{ $employee['id'] }})" wire:loading.attr="disabled">
                            {{ __('Activate Account') }}
                        </x-jet-button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-table>

    <!-- Change User Status Modal -->
    <x-jet-dialog-modal id="changingStatusModal" wire:model="changingStatus">
        <x-slot name="title">
            @if(isset($selectedUser))
                @if(!$selectedUser->trashed())
                    {{ __('Deactivate Account') }}
                @else
                    {{ __('Activate Account') }}
                @endif

                <p class="text-gray-500 text-sm">{{ $selectedUser->name }} {{ $selectedUser->lastname }} | {{ $selectedUser->email }}</p>
            @endif
        </x-slot>

        <x-slot name="content">
            @if(isset($selectedUser))
                @if(!$selectedUser->trashed())
                    {{ __('Czy na pewno chcesz wyłączyć konto tego przedstawiciela?') }}<br>
                    {{ __('Wyceny stworzone przez tego przedstawiciela zostaną w panelu.') }}
                @else
                    {{ __('Czy na pewno chcesz włączyć konto tego przedstawiciela?') }}
                @endif
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('changingStatus')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            @if(isset($selectedUser))
                @if(!$selectedUser->trashed())
                    <x-jet-danger-button class="ml-2" wire:click="changeUserStatus" wire:loading.attr="disabled">
                        {{ __('Deactivate Account') }}
                    </x-jet-danger-button>
                @else
                    <x-jet-button class="ml-2" wire:click="changeUserStatus" wire:loading.attr="disabled">
                        {{ __('Activate Account') }}
                    </x-jet-button>
                @endif
            @endif
        </x-slot>
    </x-jet-dialog-modal>


    <!-- Change User Group Modal -->
    <x-jet-dialog-modal id="changingGroupModal" wire:model="changingGroup">
        <x-slot name="title">
            @if(isset($selectedUser))
                {{ __('Change user group') }}

                <p class="text-gray-500 text-sm">{{ $selectedUser->name }} {{ $selectedUser->lastname }} | {{ $selectedUser->email }}</p>
            @endif
        </x-slot>

        <x-slot name="content">
            <select id="group" wire:model.defer="group" class="mt-1 block form-select w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                @foreach ($groups as $group)
                    <option value="{{ $group->name }}">{{ $group->name }}</option>
                @endforeach
            </select>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('changingGroup')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            @if(isset($selectedUser))
                <x-jet-button class="ml-2" wire:click="changeUserGroup" wire:loading.attr="disabled">
                    {{ __('Change group') }}
                </x-jet-button>
            @endif
        </x-slot>
    </x-jet-dialog-modal>
</div>