<x-layout>
    <div class="mx-auto pt-5 w-50">
        <h1 class="text-left mb-5">Crear servicio</h1>
        <form method="POST" action="/servicios">
            @csrf
            <div class="row mb-3">
                <x-form-label for="title">Título</x-form-label>
                <x-form-input id="title" name="title"/>
            </div>
            <div class="row mb-3">
                <x-form-label for="description">Descripción</x-form-label>
                <x-form-input id="description" />
            </div>
            <div class="row mb-3">
                <x-form-label for="price">Precio</x-form-label>
                <x-form-input id="price" />
            </div>
            <div class="row mb-3">
                <x-form-label for="image">Imagen</x-form-label>
                <x-form-input type="file" id="image"></x-form-input>
            </div>
            <fieldset class="row mb-3">
                <x-form-label>Estado</x-form-label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="true" value="true" checked>
                        <label class="form-check-label" for="true">
                            Público
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="false" value="false">
                        <label class="form-check-label" for="false">
                            Privado
                        </label>
                    </div>
                </div>
            </fieldset>
            <div class="row mb-3">
                <div class="col-sm-10 offset-sm-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="tech">
                        <label class="form-check-label" for="tech">
                            Tecnología
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sports">
                        <label class="form-check-label" for="sports">
                            Deportes
                        </label>
                    </div>
                </div>
            </div>
            <x-form-button>Crear servicio</x-form-button>
        </form>
    </div>
</x-layout>