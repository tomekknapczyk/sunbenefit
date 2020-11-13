<div class="px-2 py-5 bg-white sm:p-3">
    <div class="flex items-center">
        <x-heroicon-o-clipboard-list class="w-8 h-8"/>
        <div class="ml-4 text-lg leading-7 font-semibold">
            Grupa {{ $group->name }}
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
</div>