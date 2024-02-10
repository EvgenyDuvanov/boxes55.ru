<div class="container">
    <h3 class="p-3">ОТЗЫВЫ</h2>
    <div id="reviewsCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($publishedReviews->chunk(1) as $chunk)
                <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
                    <div class="row justify-content-center">
                        @foreach($chunk as $review)
                            <div class="col-lg-4">
                                <img src="{{ asset($review->image) }}" alt="{{ $review->name }}" width="230" height="230" class="rounded-circle">
                                <h2 class="fw-normal">{{ $review->name }}</h2>
                                <p class="border-bottom p-2">{{ $review->car_model }}</p>
                                <p>{{ $review->info }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#reviewsCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#reviewsCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- <button type="button" class="btn btn-secondary rounded-pill px-3" href="">Оставить свой отзыв!</button> --}}
</div>
