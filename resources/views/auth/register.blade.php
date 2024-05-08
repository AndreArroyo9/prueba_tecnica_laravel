<x-layout>
    <div class="mx-auto pt-5 w-50">
        <h1 class="text-left mb-5">Crear servicio</h1>
        <form method="POST" action="/register">
            @csrf
            <div class="row mb-3">
                <x-form-label for="name">Nombre</x-form-label>
                <x-form-input id="name" name="name" />
                <x-form-error name="name"></x-form-error>
            </div>
            <div class="row mb-3">
                <x-form-label for="last_name">Apellido</x-form-label>
                <x-form-input id="last_name" name="last_name" />
                <x-form-error name="last_name"></x-form-error>
            </div>
            <div class="row mb-3">
                <x-form-label for="email">Correo electrónico</x-form-label>
                <x-form-input id="email" name="email" />
                <x-form-error name="email"></x-form-error>
            </div>
            <div class="row mb-3">
                <x-form-label for="password">Contraseña</x-form-label>
                <x-form-input type="password" id="password" name="password" />
                <x-form-error name="password"></x-form-error>
            </div>
            <div class="row mb-3">
                <x-form-label for="password_confirmation">Confirmar contraseña</x-form-label>
                <x-form-input type="password" id="password_confirmation" name="password_confirmation" />
                <x-form-error name="password_confirmation"></x-form-error>
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
    </div>
</x-layout>