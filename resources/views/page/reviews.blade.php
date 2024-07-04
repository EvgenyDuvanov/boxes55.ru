<div class="container">
    <h3 class="p-3">ОТЗЫВЫ</h2>
    <div id="reviewsCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($reviews->chunk(1) as $chunk)
                <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
                    <div class="row justify-content-center">
                        @foreach($chunk as $review)
                            <div class="col-lg-4 d-flex flex-column align-items-center">
                                <div class="image-container">
                                    <img src="{{ asset($review->image) }}" alt="{{ $review->name }}" class="review-image rounded-circle">
                                </div>
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
    <a class="pt-4" href="{{ route('review.create') }}">
        <button type="button" class="btn btn-warning rounded-pill">Оставить свой отзыв!</button>
    </a>
</div>

<style>
.image-container {
    width: 230px;
    height: 230px;
    overflow: hidden;
    border-radius: 50%; /* Обрезка изображения до круга */
    display: flex;
    align-items: center;
    justify-content: center;
}

.review-image {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Обрезка изображения, сохраняя соотношение сторон */
}

</style>

{{-- <div class="col-lg-4">
                                <img src="{{ asset($review->image) }}" alt="{{ $review->name }}" width="230" height="230" class="rounded-circle">
                                <h2 class="fw-normal">{{ $review->name }}</h2>
                                <p class="border-bottom p-2">{{ $review->car_model }}</p>
                                <p>{{ $review->info }}</p>
                            </div> --}}