<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('admin.index');
    }

    public function profileIndex()
    {
        return view('admin.profile.index');
    }

    public function clientsIndex()
    {
        return view('admin.clients.index');
    }

    public function productsIndex()
    {
        return view('admin.products.index');
    }

    public function applicationIndex()
    {
        return view('admin.application.index');
    }

    public function consultationIndex()
    {
        return view('admin.consultation.index');
    }

    // public function reviewIndex()
    // {
    //     $reviews = Review::publishedReviews();

    //     return view('admin.review.index', compact('reviews'));
    // }

    public function reviewIndex(Request $request)
    {
        $filter = $request->input('filter');

        switch ($filter) {
            case 'published':
                $reviews = Review::where('published', true)->paginate(9);
                break;
            case 'unpublished':
                $reviews = Review::where('published', false)->paginate(9);
                break;
            case 'all':
            default:
                $reviews = Review::paginate(1000);
                break;
        }

        return view('admin.review.index', compact('reviews'));
    }

    public function createReview()
    {
        return view('admin.review.create');
    }

    public function storeReview(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'car_model' => 'required|string|max:255',
            'info' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/reviews'), $imageName);
        }

        Review::create([
            'name' => $request->name,
            'car_model' => $request->car_model,
            'info' => $request->info,
            'image' => 'images/reviews/'.$imageName,
            'published' => false,
        ]);

        return redirect()->route('admin.review')->with('success', 'Отзыв успешно создан, измените его статус, что бы отзыв появился на сайте!');
    }

    public function editReview(Review $review)
    {
        return view('admin.review.edit', compact('review'));
    }

    public function publishReview(Review $review)
    {
        $review->published = true;
        $review->save();

        return redirect()->route('admin.review')->with('success', 'Отзыв был успешно опубликован!');
    }

    public function unpublishReview(Review $review)
    {
        $review->published = false;
        $review->save();

        return redirect()->route('admin.review')->with('success', 'Отзыв успешно снят с публикации!');
    }

    public function destroyReview($id)
    {
        $review = Review::findOrFail($id);

        if ($review->image) {
            $imagePath = public_path($review->image);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Удаление файла изображения
            }
        }

        $review->delete();

        return redirect()->route('admin.review')->with('success', 'Отзыв был успешно удален!');
    }



}
