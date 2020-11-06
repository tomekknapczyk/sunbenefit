<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div>
        <x-jet-application-logo class="block h-12 w-auto" />
    </div>

    <div class="mt-8 text-2xl">
        Witaj w kalkulatorze SunBenefit
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2">
    <a href="{{ route('login') }}" class="hover:bg-gray-100">
        <div class="p-6 hover:bg-gray-100 text-green-700">
            <div class="flex items-center">
                <x-heroicon-o-adjustments class="w-8 h-8"/>
                <div class="ml-4 text-lg leading-7 font-semibold">
                    Stwórz wycenę
                </div>
            </div>

            <div class="ml-12">
                <div class="mt-2 text-gray-600 text-sm">
                    Tutaj utworzysz nową wycenę instalacji fotowoltaicznej
                </div>
            </div>
        </div>
    </a>

    <a href="{{ route('profile.show') }}" class="hover:bg-gray-100">
        <div class="p-6 border-gray-200 md:border-l text-green-700">
            <div class="flex items-center">
                <x-heroicon-o-cog class="w-8 h-8"/>
                <div class="ml-4 text-lg leading-7 font-semibold">
                    Skonfiguruj swój kalkulator
                </div>
            </div>

            <div class="ml-12">
                <div class="mt-2 text-gray-600 text-sm">
                    Tu możesz skonfigurować swój formularz wyceny
                </div>
            </div>
        </div>
    </a>

    <a href="{{ route('profile.show') }}" class="hover:bg-gray-100">
        <div class="p-6 border-gray-200 md:border-t text-green-700">
            <div class="flex items-center">
                <x-heroicon-o-collection class="w-8 h-8"/>
                <div class="ml-4 text-lg leading-7 font-semibold">
                    Przeglądaj wyceny
                </div>
            </div>

            <div class="ml-12">
                <div class="mt-2 text-gray-600 text-sm">
                    Tu możesz przeglądać swoje wyceny
                </div>
            </div>
        </div>
    </a>

    <a href="{{ route('profile.show') }}" class="hover:bg-gray-100">
        <div class="p-6 border-gray-200 md:border-t md:border-l text-green-700">
            <div class="flex items-center">
                <x-heroicon-o-user class="w-8 h-8"/>
                <div class="ml-4 text-lg leading-7 font-semibold">
                    Edycja profilu
                </div>
            </div>

            <div class="ml-12">
                <div class="mt-2 text-gray-600 text-sm">
                    Tu możesz edytować swoje dane
                </div>
            </div>
        </div>
    </a>
</div>
