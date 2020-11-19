<x-guest-layout>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-700 sm:items-center sm:pt-0">
        @if (Route::has('login') && Route::has('register'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
            </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <img src="{{ asset('images/logo.png') }}" class="max-w-full h-auto">
            </div>

            <div class="mt-8 bg-white dark:bg-gray-900 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <a href="{{ route('login') }}" class="hover:bg-gray-100 dark:hover:bg-gray-800">
                        <div class="p-6 text-green-700 dark:text-green-500">
                            <div class="flex items-center">
                                <x-heroicon-o-adjustments class="w-8 h-8"/>
                                <div class="ml-4 text-lg leading-7 font-semibold">
                                    Kalkulator
                                </div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Stwórz wycenę instalacji fotowoltaicznej
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="https://www.sunbenefit.pl/" target="_blank" class="hover:bg-gray-100 dark:hover:bg-gray-800">
                        <div class="p-6 border-gray-200 dark:border-gray-700 md:border-l text-green-700 dark:text-green-500">
                            <div class="flex items-center">
                                <x-heroicon-o-globe class="w-8 h-8"/>
                                <div class="ml-4 text-lg leading-7 font-semibold">
                                    Sunbenefit.pl
                                </div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Strona internetowa firmy
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
