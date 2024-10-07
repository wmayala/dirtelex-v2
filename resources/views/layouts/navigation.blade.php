<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 mt-2" style="height: 75px;">

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-center h-16">
            <div class="flex">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('directory.contacts') }}">
                        <x-application-logo-blue class="block h-9 w-auto fill-current text-gray-800"/>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('directory.contacts')" :active="request()->routeIs('directory.contacts')" class="d-flex gap-1">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        <span>{{ __('Directorio') }}</span>
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('contact.index')" :active="request()->routeIs('contact.index')" class="d-flex gap-1">
                        <i class="fa fa-address-book" aria-hidden="true"></i>
                        <span>{{ __('Contactos') }}</span>
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('institution.index')" :active="request()->routeIs('home')" class="d-flex gap-1">
                        <i class="fa fa-building" aria-hidden="true"></i>
                        <span>{{ __('Instituciones') }}</span>
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('category.index')" :active="request()->routeIs('category.index')" class="d-flex gap-1">
                        <i class="fa fa-th-large" aria-hidden="true"></i>
                        <span>{{ __('Categorías') }}</span>
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('subcategory.index')" :active="request()->routeIs('subcategory.index')" class="d-flex gap-1">
                        <i class="fa fa-th" aria-hidden="true"></i>
                        <span>{{ __('Subcategorías') }}</span>
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('division.index')" :active="request()->routeIs('division.index')" class="d-flex gap-1">
                        <i class="fa fa-th-list" aria-hidden="true"></i>
                        <span>{{ __('Divisiones') }}</span>
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div class="text-xs">{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        @if(Auth::user()->is_admin==1)
                            <x-dropdown-link :href="route('user.index')" class="d-flex align-items-center gap-2">
                                <i class="fa fa-users" aria-hidden="true"></i><span>{{ __('Usuarios') }}</span>
                            </x-dropdown-link>
                        @endif
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="d-flex align-items-center gap-1">
                                <i class="fa fa-sign-out" aria-hidden="true"></i><span></span>{{ __('Cerrar Sesión') }}</span>
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>

