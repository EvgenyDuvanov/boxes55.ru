<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Notifications\ReviewNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ReviewController extends Controller
{
    public function create()
    {
        return view('review.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'car_model' => 'required|max:255',
            'info' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Валидация изображения
        ]);

        $review = new Review();
        $review->name = $request->name;
        $review->car_model = $request->car_model;
        $review->info = $request->info;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('image'), $imageName);
            $review->image = 'image/' . $imageName;
        }

        $review->save();

        $recipients = ['boxes55@mail.ru', 'evgenysimukhin@gmail.com', 'novokshonovrus@mail.ru', 'nnovokshonov@gmail.com'];

        Notification::route('mail', $recipients)
            ->notify(new ReviewNotification($review));

        return redirect()->route('review.create')
            ->with('success', 'Спасибо за Ваш отзыв! После модерации он будет опубликован на нашем сайте!');

    }
}
