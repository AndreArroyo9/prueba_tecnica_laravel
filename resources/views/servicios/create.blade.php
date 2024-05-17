<x-layout>
    <div class="mx-auto pt-5 w-50">
        <h1 class="text-left mb-5">Crear servicio</h1>
        <form method="POST" action="/servicios" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <x-form-label for="title">Título</x-form-label>
                <x-form-input id="title" name="title"/>
                <x-form-error name="title"></x-form-error>
            </div>
            <div class="row mb-3">
                <x-form-label for="description">Descripción</x-form-label>
                <x-form-textarea id="description" name="description"></x-form-textarea>
                <x-form-error name="description"></x-form-error>
            </div>
            <div class="row mb-3">
                <x-form-label for="price">Precio</x-form-label>
                <x-form-input id="price" name="price" />
                <x-form-error name="price"></x-form-error>
            </div>
            <div class="row mb-3">
                <x-form-label for="image">Imagen</x-form-label>
                <x-form-input type="file" id="image" name="image"></x-form-input>
                <x-form-error name="image"></x-form-error>
            </div>
            <fieldset class="row mb-3">
                <x-form-label>Estado</x-form-label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="public" value="1" checked>
                        <label class="form-check-label" for="public">
                            Público
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="private" value="0">
                        <label class="form-check-label" for="private">
                            Privado
                        </label>
                    </div>
                </div>
            </fieldset>
            <x-category-fieldset category="1"></x-category-fieldset>
            <x-form-button>Crear servicio</x-form-button>
        </form>
    </div>
</x-layout>
