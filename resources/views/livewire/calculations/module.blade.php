<div class="flex lg:block 2xl:flex w-full xl:max-w-2xl w-full h-auto overflow-hidden" wire:click="select">
    <div class="h-full lg:h-auto w-1/3 lg:w-full 2xl:w-1/3 2xl:rounded-lg 2xl:rounded-r-none shadow-lg relative p-2 bg-white dark:bg-gray-900 flex items-start 2xl:block flex-wrap">
        @if($module->file_name)
            <img src="{{ asset('storage/photos/' . $module->file_name) }}" class="h-48 lg:h-32 2xl:h-64 w-full lg:w-1/2 2xl:w-full object-contain rounded-lg rounded-r-none">
        @endif
        <div class="w-full lg:w-1/2 2xl:w-full">
            <div class="grid grid-cols-5 gap-2 items-center dark:text-gray-200 py-1 px-2 text-sm border-b">
                <p class="col-span-5 sm:col-span-3">
                    {{ __('Warranty') }}:
                </p>
                <p class="col-span-5 sm:col-span-2 text-green-500 sm:text-right">
                    {{ $module->warranty }}
                </p>
            </div>
            <div class="grid grid-cols-5 gap-2 items-center dark:text-gray-200 py-1 px-2 text-sm border-b">
                <p class="col-span-5 sm:col-span-3">
                    {{ __('Efficiency') }}:
                </p>
                <p class="col-span-5 sm:col-span-2 text-green-500 sm:text-right">
                    {{ $module->efficiency }} %
                </p>
            </div>
            <div class="grid grid-cols-5 gap-2 items-center py-1 px-2 text-gray-700 dark:text-gray-300 text-sm">
                <p class="col-span-5 sm:col-span-3">
                    {{ __('Performance after 25 years') }}:
                </p>
                <p class="col-span-5 sm:col-span-2 text-green-500 sm:text-right">
                    {{ $module->performance }} %
                </p>
            </div>
        </div>
    </div>

    <div class="w-2/3 lg:w-full 2xl:w-2/3 px-4 py-4 bg-white dark:bg-gray-900 2xl:rounded-lg 2xl:rounded-l-none">
        <div class="flex items-center mb-2">
            <h2 class="text-xl text-gray-800 dark:text-gray-200 font-medium mr-auto">{{ $module->name }}</h2>
        </div>
        <div class="grid grid-cols-5 gap-2 items-center bg-gray-50 dark:bg-gray-800 dark:text-gray-200 py-1 px-2 @if($solar) bg-purple-500 dark:bg-purple-500 text-gray-200 @else text-gray-700 @endif">
            <p class="text-sm col-span-3">
                Cena zestawu @if($solar) z inwerterem Solar Edge @endif:
                
            </p>
            <p class="text-lg col-span-2">
                {{ $price }} zł
            </p>
        </div>
        <div class="grid grid-cols-5 gap-2 items-center bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-gray-300 py-1 px-2">
            <p class="text-sm col-span-3">
                Cena zestawu z wpłatą:
            </p>
            <p class="text-lg col-span-2">
                {{ $price_with_deposit }} zł
            </p>
        </div>
        <div class="grid grid-cols-5 gap-2 items-center bg-gray-50 dark:bg-gray-800 py-1 px-2 text-gray-700 dark:text-gray-300">
            <p class="text-sm col-span-3">
                Moc [kW]/szt:
            </p>
            <p class="text-lg col-span-2">
                {{ $actual_power }} / {{ $qty }} szt.
            </p>
        </div>
        <div class="grid grid-cols-5 gap-2 items-center bg-gray-300 dark:bg-gray-700 py-1 px-2 text-gray-700 dark:text-gray-300">
            <p class="text-sm col-span-3">
                Rata:
            </p>
            <p class="text-lg col-span-2">
                {{ $installment }} zł
            </p>
        </div>
        <div class="grid grid-cols-5 gap-2 items-center bg-gray-50 dark:bg-gray-800 py-1 px-2 text-gray-700 dark:text-gray-300">
            <p class="text-sm col-span-3">
                {{ $dotation->label }}:
            </p>
            <p class="text-lg col-span-2">
                {{ $price_with_dotation }} zł
            </p>
        </div>
        <div class="grid grid-cols-5 gap-2 items-center bg-gray-300 dark:bg-gray-700 py-1 px-2 text-gray-700 dark:text-gray-300">
            <p class="text-sm col-span-3">
                Rata:
            </p>
            <p class="text-lg col-span-2">
                {{ $installment2 }} zł
            </p>
        </div>
        <div class="grid grid-cols-5 gap-2 items-center bg-gray-50 dark:bg-gray-800 py-1 px-2 text-gray-700 dark:text-gray-300">
            <p class="text-sm col-span-3">
                {{ $tax_relief->label }}:
            </p>
            <p class="text-lg col-span-2">
                {{ $price_with_relief }} zł
            </p>
        </div>
        <div class="grid grid-cols-5 gap-2 items-center bg-gray-300 dark:bg-gray-700 py-1 px-2 text-gray-700 dark:text-gray-300">
            <p class="text-sm col-span-3">
                Rata końcowa:
            </p>
            <p class="text-lg col-span-2">
                {{ $installment_final }} zł
            </p>
        </div>
    </div>
</div>