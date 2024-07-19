@extends('layouts.dop')

@section('page.title', 'Отзывы')

@section('content')
<div class="container">
    <h3 class="pt-3">ОТЗЫВЫ</h3>
    <div class="text-center p-2 d-flex justify-content-center">
        <a href="{{ route('admin.reviews.create') }}" class="mx-2">
            <button type="button" class="btn btn-warning rounded-pill">Создать новый отзыв</button>
        </a>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="text-center p-2 d-flex justify-content-center">
        <form action="" method="GET" class="d-flex">
            <div class="form-check mx-2">
                <input class="form-check-input" type="radio" name="filter" id="allReviews" value="all" {{ request('filter') == 'all' ? 'checked' : '' }} onchange="this.form.submit()">
                <label class="form-check-label" for="allReviews">ВСЕ отзывы</label>
            </div>
            <div class="form-check mx-2">
                <input class="form-check-input" type="radio" name="filter" id="publishedReviews" value="published" {{ request('filter') == 'published' ? 'checked' : '' }} onchange="this.form.submit()">
                <label class="form-check-label" for="publishedReviews">Опубликованные</label>
            </div>
            <div class="form-check mx-2">
                <input class="form-check-input" type="radio" name="filter" id="unpublishedReviews" value="unpublished" {{ request('filter') == 'unpublished' ? 'checked' : '' }} onchange="this.form.submit()">
                <label class="form-check-label" for="unpublishedReviews">На модерации</label>
            </div>
        </form>
    </div>
    <div class="row">
        @foreach($reviews as $review)
            <div class="col-lg-4 d-flex flex-column align-items-center mb-4">
                <div class="card shadow-sm w-100">
                    
                    <div class="card-body text-center">
                        <div class="image-container mx-auto mb-3">
                            <img src="{{ asset($review->image) }}" alt="{{ $review->name }}" class="review-image rounded-circle">
                        </div>
                        <p class="mt-2">
                            @if($review->published)
                                <span class="badge bg-success">Отзыв опубликован</span>
                            @else
                                <span class="badge bg-warning text-dark">Отзыв на модерации</span>
                            @endif
                        </p>
                        <h5 class="card-title">{{ $review->name }}</h5>
                        <p class="card-subtitle mb-2 text-muted">{{ $review->car_model }}</p>
                        <p class="card-text">{{ $review->info }}</p>
                        <small class="text-body-secondary">{{ $review->created_at->diffForHumans() }}</small>
                        
                    </div>
                    <div class="text-center p-2 d-flex justify-content-around">
                        @if($review->published)
                            <form action="{{ route('review.unpublish', $review->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите снять этот отзыв с публикации?');">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-warning">Снять с публикации</button>
                            </form>
                        @else
                            <form action="{{ route('review.publish', $review->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите опубликовать этот отзыв?');">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-warning">Опубликовать</button>
                            </form>
                        @endif
                        <form action="{{ route('review.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить этот отзыв?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
    {{-- <div class="d-flex justify-content-center">
        {{ $reviews->appends(request()->input())->links() }}
    </div> --}}
</div>

<style>
.image-container {
    width: 230px;
    height: 230px;
    overflow: hidden;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.review-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
</style>

@endsection
