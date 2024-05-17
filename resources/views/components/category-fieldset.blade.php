<fieldset class="row mb-3" id="category">
    <x-form-label>Categoría:</x-form-label>
    <div class="col-sm-10">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="category" id="tech" value="1" {{ $category == '1' ? 'checked' : "" }}>
            <label class="form-check-label" for="tech">
                Tecnología
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="category" id="sport" value="2" {{ $category == '2' ? 'checked' : "" }}>
            <label class="form-check-label" for="sport">
                Deportes
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="category" id="music" value="3" {{ $category == '3' ? 'checked' : "" }}>
            <label class="form-check-label" for="music">
                Música
            </label>
        </div>
    </div>
</fieldset>
