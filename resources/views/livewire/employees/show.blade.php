<div class="flex flex-col" wire:model="confirm">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Imię i nazwisko
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Numer telefonu
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Status
                            </th>
                            <th class="px-6 py-3 bg-gray-50"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
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
                                    @if(!$employee->trashed())
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Aktywny
                                        </span>
                                    @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Usunięty
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                    @if(!$employee->trashed())
                                    <x-jet-danger-button class="ml-2" wire:click="confirmDeactivation({{ $employee['id'] }})" wire:loading.attr="disabled">
                                        {{ __('Deactivate Account') }}
                                    </x-jet-danger-button>
                                    @else
                                    <x-jet-button class="ml-2" wire:click="confirmDeactivation({{ $employee['id'] }})" wire:loading.attr="disabled">
                                        {{ __('Activate Account') }}
                                    </x-jet-button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Delete User Confirmation Modal -->
    <x-jet-dialog-modal wire:model="confirm">
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
            <x-jet-secondary-button wire:click="$toggle('confirm')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            @if(isset($selectedUser))
                @if(!$selectedUser->trashed())
                    <x-jet-danger-button class="ml-2" wire:click="changeUserActive" wire:loading.attr="disabled">
                        {{ __('Deactivate Account') }}
                    </x-jet-danger-button>
                @else
                    <x-jet-button class="ml-2" wire:click="changeUserActive" wire:loading.attr="disabled">
                        {{ __('Activate Account') }}
                    </x-jet-button>
                @endif
            @endif
        </x-slot>
    </x-jet-dialog-modal>
</div>