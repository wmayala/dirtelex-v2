<x-guest-layout>
    @section('title','Registrar usuarios')
    <div class="container col-lg-4 col-xl-4 col-xxl-4 d-flex flex-column align-items-center justify-content-center rounded-lg shadow-lg bg-white p-4 mt-5">
        <form method="POST" action="{{ route('register') }}" class="w-full">
            @csrf

            <div class="d-flex flex-column align-items-center">
                <x-application-logo-blue class="block h-9 w-auto fill-current text-gray-800"/>
                <div class="fw-bold">Registro de usuarios</div>
            </div>
            
            <!-- Name -->
            <div class="mt-4">
                <x-input-label for="name" :value="__('Nombre de usuario')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Correo electrónico')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Contraseña')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('¿Ya se encuentra registrado?') }}
                </a>

                <x-primary-button class="ms-4" style="background-color: #111e60;">
                    {{ __('Registrar') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
