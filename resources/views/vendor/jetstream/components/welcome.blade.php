<div class="p-6 sm:px-20 bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700">
    <div>
        <x-jet-application-logo class="block h-12 w-auto" />
    </div>

    <div class="mt-8 text-2xl dark:text-white">
        Witaj w kalkulatorze SunBenefit
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2">
    <a href="{{ route('login') }}" class="hover:bg-gray-100 dark:hover:bg-gray-800">
        <div class="p-6 text-green-700 dark:text-green-500">
            <div class="flex items-center">
                <x-heroicon-o-adjustments class="w-8 h-8"/>
                <div class="ml-4 text-lg leading-7 font-semibold">
                    Stwórz wycenę
                </div>
            </div>

            <div class="ml-12">
                <div class="mt-2 text-gray-600  dark:text-gray-400 text-sm">
                    Tutaj utworzysz nową wycenę instalacji fotowoltaicznej
                </div>
            </div>
        </div>
    </a>

    <a href="{{ route('calculator') }}" class="hover:bg-gray-100 dark:hover:bg-gray-800">
        <div class="p-6 border-gray-200 dark:border-gray-700 md:border-l text-green-700 dark:text-green-500">
            <div class="flex items-center">
                <x-heroicon-o-cog class="w-8 h-8 @if(!auth()->user()->calculator) text-red-600 @endif"/>
                <div class="ml-4 text-lg leading-7 font-semibold @if(!auth()->user()->calculator) text-red-600 underline font-bold @endif">
                    Skonfiguruj swój kalkulator
                </div>
            </div>

            <div class="ml-12">
                @if(auth()->user()->calculator)
                    <div class="mt-2 text-gray-600  dark:text-gray-400 text-sm">
                        Tu możesz skonfigurować swój formularz wyceny
                    </div>
                @else
                    <div class="mt-2 text-red-600 text-sm font-bold">
                        Zanim zaczniesz tworzyć wyceny, skonfiguruj swój kalkulator !
                    </div>
                @endif
            </div>
        </div>
    </a>

    <a href="{{ route('profile.show') }}" class="hover:bg-gray-100 dark:hover:bg-gray-800">
        <div class="p-6 border-gray-200 dark:border-gray-700 md:border-t text-green-700 dark:text-green-500">
            <div class="flex items-center">
                <x-heroicon-o-collection class="w-8 h-8"/>
                <div class="ml-4 text-lg leading-7 font-semibold">
                    Przeglądaj wyceny
                </div>
            </div>

            <div class="ml-12">
                <div class="mt-2 text-gray-600  dark:text-gray-400 text-sm">
                    Tu możesz przeglądać swoje wyceny
                </div>
            </div>
        </div>
    </a>

    <a href="{{ route('profile.show') }}" class="hover:bg-gray-100 dark:hover:bg-gray-800">
        <div class="p-6 border-gray-200 dark:border-gray-700 md:border-t md:border-l text-green-700 dark:text-green-500">
            <div class="flex items-center">
                <x-heroicon-o-user class="w-8 h-8"/>
                <div class="ml-4 text-lg leading-7 font-semibold">
                    Edycja profilu
                </div>
            </div>

            <div class="ml-12">
                <div class="mt-2 text-gray-600  dark:text-gray-400 text-sm">
                    Tu możesz edytować swoje dane
                </div>
            </div>
        </div>
    </a>
</div>
