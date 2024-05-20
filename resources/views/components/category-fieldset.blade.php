<fieldset class="row mb-3" id="category">
    <x-form-label>Categoría:</x-form-label>
    <div class="col-sm-10">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="category" id="tech" value="Tecnología" {{ $category == 'Tecnología' ? 'checked' : "" }}>
            <label class="form-check-label" for="tech">
                Tecnología
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="category" id="sport" value="Deportes" {{ $category == 'Deportes' ? 'checked' : "" }}>
            <label class="form-check-label" for="sport">
                Deportes
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="category" id="music" value="Música" {{ $category == 'Música' ? 'checked' : "" }}>
            <label class="form-check-label" for="music">
                Música
            </label>
        </div>
    </div>
</fieldset>
