<x-layout>
    <div class="mx-auto pt-5 w-50">
        <div class="d-flex flex-row justify-content-between align-items-center mb-2">
            <h1 class="text-left">Editar servicio</h1>
            <form method="POST" action="/servicios/{{ $servicio->id }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Eliminar servicio</button>
            </form>
        </div>
        <h4 class="text-left mb-5">Propietario: {{ $servicio->creator->user->name }} {{ $servicio->creator->user->last_name }}</h4>
        <form method="POST" action="/servicios/{{ $servicio->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row mb-3">
                <x-form-label for="title">Título</x-form-label>
                <x-form-input id="title" name="title" value="{{ $servicio->title }}" />
                <x-form-error name="title"></x-form-error>
            </div>
            <div class="row mb-3">
                <x-form-label for="description">Descripción</x-form-label>
                <x-form-textarea id="description" name="description">{{ $servicio->description }}</x-form-textarea>
                <x-form-error name="description"></x-form-error>
            </div>
            <div class="row mb-3">
                <x-form-label for="price">Precio</x-form-label>
                <x-form-input id="price" name="price" value="{{ $servicio->price }}" />
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
                        <input class="form-check-input" type="radio" name="status" id="public" value="1" {{ $servicio->status == '1' ? 'checked' : "" }}>
                        <label class="form-check-label" for="public">
                            Público
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="private" value="0" {{ $servicio->status == '0' ? 'checked' : "" }}>
                        <label class="form-check-label" for="private">
                            Privado
                        </label>
                    </div>
                </div>
            </fieldset>
            <x-category-fieldset category="{{ $servicio->category }}"></x-category-fieldset>
            <x-form-button class="mt-3 mr-3">Actualizar servicio</x-form-button>
            <a href="/servicios" class="btn btn-secondary mt-3" type="submit">Cancelar</a>
        </form>
    </div>
</x-layout>
