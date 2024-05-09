<x-layout>  
<div class="mx-auto pt-5 w-50">
        <h1 class="text-left mb-5">Iniciar sesión</h1>
        <form method="POST">
            @csrf
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
            <button type="submit" class="btn btn-primary mt-3">Login</button>
        </form>
    </div>
</x-layout>