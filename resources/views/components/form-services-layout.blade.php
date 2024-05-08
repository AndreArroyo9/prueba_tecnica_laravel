<x-layout>
    <div class="mx-auto pt-5 w-50">
        <h1 class="text-left mb-5">{{ $heading }}</h1>
        <form method="POST" action="/servicios" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <x-form-label for="title">Título</x-form-label>
                <x-form-input id="title" name="title"/>
                <x-form-error name="title"></x-form-error>
            </div>
            <div class="row mb-3">
                <x-form-label for="description">Descripción</x-form-label>
                <x-form-input id="description" name="description" />
                <x-form-error name="description"></x-form-error>
            </div>
            <div class="row mb-3">
                <x-form-label for="price">Precio</x-form-label>
                <x-form-input id="price" name="price" />
                <x-form-error name="price"></x-form-error>
            </div>
            <!-- https://laracoding.com/making-a-file-upload-form-in-laravel-a-step-by-step-guide/ -->
            <div class="row mb-3">
                <x-form-label for="image">Imagen</x-form-label>
                <x-form-input type="file" id="image" name="image"></x-form-input>
                <x-form-error name="image"></x-form-error>
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
                <x-form-label>Categorías</x-form-label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="tech" name="tech">
                        <label class="form-check-label" for="tech">
                            Tecnología
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sports" name="sports">
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