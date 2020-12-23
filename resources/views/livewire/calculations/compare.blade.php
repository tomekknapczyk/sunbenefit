<x-modal var="compare" maxWidth="5xl">
    <x-slot name="title"></x-slot>
    <x-slot name="content">
        <div class="grid grid-cols-4 gap-1 items-center">
            <div class="sm:col-span-1"></div>
            <div class="sm:col-span-1 bg-gray-400 dark:bg-gray-600 text-gray-800 dark:text-gray-300 text-xl text-center font-semibold">{{ $module1->name ?? '-' }}</div>
            <div class="sm:col-span-1 bg-gray-400 dark:bg-gray-600 text-gray-800 dark:text-gray-300 text-xl text-center font-semibold">{{ $module2->name ?? '-' }}</div>
            <div class="sm:col-span-1 bg-gray-400 dark:bg-gray-600 text-gray-800 dark:text-gray-300 text-xl text-center font-semibold">{{ $module3->name ?? '-' }}</div>
            {{-- Power --}}
            <div class="sm:col-span-1 bg-gray-300 dark:bg-gray-900 text-gray-700 dark:text-gray-300 p-2 text-right font-semibold">{{ __('Power') }}</div>
            <div class="sm:col-span-1 bg-gray-300 dark:bg-gray-900 text-gray-700 dark:text-gray-300 p-2 text-center">{{ $module1->power ?? '-' }} W</div>
            <div class="sm:col-span-1 bg-gray-300 dark:bg-gray-900 text-gray-700 dark:text-gray-300 p-2 text-center">{{ $module2->power ?? '-' }} W</div>
            <div class="sm:col-span-1 bg-gray-300 dark:bg-gray-900 text-gray-700 dark:text-gray-300 p-2 text-center">{{ $module3->power ?? '-' }} W</div>
            {{-- Gwarancja --}}
            <div class="sm:col-span-1 bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-300 p-2 text-right font-semibold">{{ __('Warranty') }}</div>
            <div class="sm:col-span-1 bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-300 p-2 text-center">{{ $module1->warranty ?? '-' }}</div>
            <div class="sm:col-span-1 bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-300 p-2 text-center">{{ $module2->warranty ?? '-' }}</div>
            <div class="sm:col-span-1 bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-300 p-2 text-center">{{ $module3->warranty ?? '-' }}</div>
            {{-- Sprawność --}}
            <div class="sm:col-span-1 bg-gray-300 dark:bg-gray-900 text-gray-700 dark:text-gray-300 p-2 text-right font-semibold">{{ __('Efficiency') }}</div>
            <div class="sm:col-span-1 bg-gray-300 dark:bg-gray-900 text-gray-700 dark:text-gray-300 p-2 text-center">{{ $module1->efficiency ?? '-' }} %</div>
            <div class="sm:col-span-1 bg-gray-300 dark:bg-gray-900 text-gray-700 dark:text-gray-300 p-2 text-center">{{ $module2->efficiency ?? '-' }} %</div>
            <div class="sm:col-span-1 bg-gray-300 dark:bg-gray-900 text-gray-700 dark:text-gray-300 p-2 text-center">{{ $module3->efficiency ?? '-' }} %</div>
            {{-- Wydajność po 25 latach --}}
            <div class="sm:col-span-1 bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-300 p-2 text-right font-semibold">{{ __('Performance after 25 years') }}</div>
            <div class="sm:col-span-1 bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-300 p-2 text-center">{{ $module1->performance ?? '-' }} %</div>
            <div class="sm:col-span-1 bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-300 p-2 text-center">{{ $module2->performance ?? '-' }} %</div>
            <div class="sm:col-span-1 bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-300 p-2 text-center">{{ $module3->performance ?? '-' }} %</div>
            {{-- P max --}}
            <div class="sm:col-span-1 bg-gray-300 dark:bg-gray-900 text-gray-700 dark:text-gray-300 p-2 text-right font-semibold">{{ __('P max') }}</div>
            <div class="sm:col-span-1 bg-gray-300 dark:bg-gray-900 text-gray-700 dark:text-gray-300 p-2 text-center">{{ $module1->pmax ?? '-' }} %</div>
            <div class="sm:col-span-1 bg-gray-300 dark:bg-gray-900 text-gray-700 dark:text-gray-300 p-2 text-center">{{ $module2->pmax ?? '-' }} %</div>
            <div class="sm:col-span-1 bg-gray-300 dark:bg-gray-900 text-gray-700 dark:text-gray-300 p-2 text-center">{{ $module3->pmax ?? '-' }} %</div>
            {{-- Wymiary --}}
            <div class="sm:col-span-1 bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-300 p-2 text-right font-semibold">{{ __('Dimension') }}</div>
            <div class="sm:col-span-1 bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-300 p-2 text-center">{{ $module1->length ?? '-' }}mm / {{ $module1->width ?? '-' }}mm</div>
            <div class="sm:col-span-1 bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-300 p-2 text-center">{{ $module2->length ?? '-' }}mm / {{ $module2->width ?? '-' }}mm</div>
            <div class="sm:col-span-1 bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-300 p-2 text-center">{{ $module3->length ?? '-' }}mm / {{ $module3->width ?? '-' }}mm</div>
            {{-- Powierzchnia --}}
            <div class="sm:col-span-1 bg-gray-300 dark:bg-gray-900 text-gray-700 dark:text-gray-300 p-2 text-right font-semibold">{{ __('Area') }} m2</div>
            <div class="sm:col-span-1 bg-gray-300 dark:bg-gray-900 text-gray-700 dark:text-gray-300 p-2 text-center">{{ $module1->area ?? '-' }} m2</div>
            <div class="sm:col-span-1 bg-gray-300 dark:bg-gray-900 text-gray-700 dark:text-gray-300 p-2 text-center">{{ $module2->area ?? '-' }} m2</div>
            <div class="sm:col-span-1 bg-gray-300 dark:bg-gray-900 text-gray-700 dark:text-gray-300 p-2 text-center">{{ $module3->area ?? '-' }} m2</div>
            {{-- Moc z m2 --}}
            <div class="sm:col-span-1 bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-300 p-2 text-right font-semibold">{{ __('Power per m2') }}</div>
            <div class="sm:col-span-1 bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-300 p-2 text-center">{{ $module1->mpower ?? '-' }} W/m2</div>
            <div class="sm:col-span-1 bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-300 p-2 text-center">{{ $module2->mpower ?? '-' }} W/m2</div>
            <div class="sm:col-span-1 bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-300 p-2 text-center">{{ $module3->mpower ?? '-' }} W/m2</div>
        </div>
    </x-slot>
</x-modal>