@props(['name'])
@error($name)
<div class="col-sm-10 offset-sm-2">
    <p class="text-danger">{{ $message }}</p>
</div>
@enderror