<nav x-data="{ open: false }" class="bg-white dark:bg-gray-900 border-b border-gray-100  dark:border-gray-800">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 lg:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 lg:-my-px lg:ml-10 lg:flex">
                    <x-jet-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-jet-nav-link>
                    
                    <x-jet-nav-link href="{{ route('calculations') }}" :active="request()->routeIs('calculations')">
                        {{ __('Moje wyceny') }}
                    </x-jet-nav-link>

                    @can('list-all', Calculation::class)
                        <x-jet-nav-link href="{{ route('all_calculations') }}" :active="request()->routeIs('all_calculations')">
                            {{ __('Lista wycen') }}
                        </x-jet-nav-link>
                    @endcan

                    <x-jet-nav-link href="{{ route('documents') }}" :active="request()->routeIs('documents')">
                        {{ __('Pliki do pobrania') }}
                    </x-jet-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden lg:flex lg:items-center lg:ml-6">
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                        @else
                            <button class="flex items-center text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        @endif
                    </x-slot>

                    <x-slot name="content">
                        @can('edit users')
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage calculator') }}
                            </div>
                            <x-jet-dropdown-link href="{{ route('employees') }}" :active="request()->routeIs('employees')">
                                {{ __('Przedstawiciele') }}
                            </x-jet-dropdown-link>
                        @endcan

                        @can('edit modules')
                            <x-jet-dropdown-link href="{{ route('modules') }}" :active="request()->routeIs('modules')">
                                {{ __('Moduły') }}
                            </x-jet-dropdown-link>
                        @endcan

                        @can('edit surcharges')
                            <x-jet-dropdown-link href="{{ route('surcharges') }}" :active="request()->routeIs('surcharges')">
                                {{ __('Dopłaty') }}
                            </x-jet-dropdown-link>
                        @endcan

                        @can('edit factors')
                            <x-jet-dropdown-link href="{{ route('factors') }}" :active="request()->routeIs('factors')">
                                {{ __('Współczynniki') }}
                            </x-jet-dropdown-link>
                        @endcan
                        
                        @can('edit attachments')
                            <x-jet-dropdown-link href="{{ route('attachments') }}" :active="request()->routeIs('attachments')">
                                {{ __('Załączniki') }}
                            </x-jet-dropdown-link>
                        @endcan

                        <div class="border-t border-gray-100"></div>

                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>

                        <x-jet-dropdown-link href="{{ route('calculator') }}">
                            {{ __('Calculator configuration') }}
                        </x-jet-dropdown-link>

                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center lg:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden lg:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link href="{{ route('calculations') }}" :active="request()->routeIs('calculations')">
                {{ __('Moje wyceny') }}
            </x-jet-responsive-nav-link>

            @can('list-all', Calculation::class)
                <x-jet-responsive-nav-link href="{{ route('all_calculations') }}" :active="request()->routeIs('all_calculations')">
                    {{ __('Lista wycen') }}
                </x-jet-responsive-nav-link>
            @endcan

            <x-jet-responsive-nav-link href="{{ route('documents') }}" :active="request()->routeIs('documents')">
                {{ __('Pliki do pobrania') }}
            </x-jet-responsive-nav-link>

            @can('edit users')
                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Manage calculator') }}
                </div>
                <x-jet-responsive-nav-link href="{{ route('employees') }}" :active="request()->routeIs('employees')">
                    {{ __('Przedstawiciele') }}
                </x-jet-responsive-nav-link>
            @endcan

            @can('edit modules')
                <x-jet-responsive-nav-link href="{{ route('modules') }}" :active="request()->routeIs('modules')">
                    {{ __('Moduły') }}
                </x-jet-responsive-nav-link>
            @endcan

            @can('edit surcharges')
                <x-jet-responsive-nav-link href="{{ route('surcharges') }}" :active="request()->routeIs('surcharges')">
                    {{ __('Dopłaty') }}
                </x-jet-responsive-nav-link>
            @endcan

            @can('edit factors')
                <x-jet-responsive-nav-link href="{{ route('factors') }}" :active="request()->routeIs('factors')">
                    {{ __('Współczynniki') }}
                </x-jet-responsive-nav-link>
            @endcan
            
            @can('edit attachments')
                <x-jet-responsive-nav-link href="{{ route('attachments') }}" :active="request()->routeIs('attachments')">
                    {{ __('Załączniki') }}
                </x-jet-responsive-nav-link>
            @endcan
                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Manage Account') }}
                </div>

                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link href="{{ route('calculator') }}" :active="request()->routeIs('calculator')">
                    {{ __('Calculator configuration') }}
                </x-jet-responsive-nav-link>

                <div class="space-y-1">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                            {{ __('Logout') }}
                        </x-jet-responsive-nav-link>
                    </form>
                </div>
            </div>
    </div>
</nav>
