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
                {{-- <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('directory.contacts')" :active="request()->routeIs('directory.contacts')" class="d-flex gap-1">
                        <i class="fa fa-address-book" aria-hidden="true"></i>
                        <span>{{ __('Contactos') }}</span>
                    </x-nav-link>
                </div> --}}
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('directory.institutions')" :active="request()->routeIs('directory.institutions')" class="d-flex gap-1">
                        <i class="fa fa-building" aria-hidden="true"></i>
                        <span>{{ __('Instituciones') }}</span>
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('directory.categories')" :active="request()->routeIs('directory.categories')" class="d-flex gap-1">
                        <i class="fa fa-th-large" aria-hidden="true"></i>
                        <span>{{ __('Categorías') }}</span>
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('directory.subcategories')" :active="request()->routeIs('directory.subcategories')" class="d-flex gap-1">
                        <i class="fa fa-th" aria-hidden="true"></i>
                        <span>{{ __('Subcategorías') }}</span>
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('directory.divisions')" :active="request()->routeIs('directory.divisions')" class="d-flex gap-1">
                        <i class="fa fa-th-list" aria-hidden="true"></i>
                        <span>{{ __('Divisiones') }}</span>
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @if (Route::has('login'))
                        <div class="">
                            @auth
                                <div class="p-3 text-end">
                                    <a href="{{ route('contact.index') }}" class="btn btn-sm rounded text-light" style="background-color: #111e60; color: #f2f2f2;">Administración</a>
                                </div>
                            @else
                                <div class="p-3 text-end">
                                    <a href="{{ route('login') }}" class="btn btn-sm rounded text-light" style="background-color: #111e60; color: #f2f2f2;">Iniciar sesión</a>
                                </div>
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>
