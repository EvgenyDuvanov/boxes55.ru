<div class="container">
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <h3>НАШЕ ОБОРУДОВАНИЕ</h3>

            @foreach($products as $key => $product)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <div class="row">
                        <div class="col-md-7 text-center mt-5 d-flex align-items-center">
                            <div>
                                <h2 class="text-center">{{ $product->name }}</h2><br>
                                <p class="text-center">{{ $product->info }}</p>
                            </div>
                        </div>
                        <div class="col-md-5 d-flex align-items-center">
                            <img src="{{ url($product->photo) }}" class="d-block w-100" alt="{{ $product->name }}">
                        </div>
                    </div>
                </div>
            @endforeach

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
