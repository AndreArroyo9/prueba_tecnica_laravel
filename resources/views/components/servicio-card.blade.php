<div class="card mx-auto mb-3" style="width: 18rem;">
    <img src="{{ $image }}" class="card-img-top" alt="...">
    <div class="card-body">
        <h4 class="card-title">{{ $title }}</h4>
        <h5 class="card-subtitle">{{ $price }} €</h5>
        <p class="card-text">{{ $info }}</p>
        <a href="/servicios/{{ $id }}" class="btn btn-primary">{{ $textButton }}</a>
    </div>
</div>
