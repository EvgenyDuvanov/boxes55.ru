<?php

namespace App\Http\Controllers;

use App\Mail\ApplicationSubmitted;
use App\Mail\QuestionSubmitted;
use App\Models\Application;
use App\Models\Faq;
use App\Models\Product;
use App\Models\Question;
use App\Models\Review;
use App\Models\Set;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function indexProducts()
    {
        $faqs             = Faq::all();
        $sets             = Set::all();
        $products         = Product::all();
        $reviews = Review::where('published', 1)->get();
        
        return view('home.index', compact('products', 'reviews', 'sets', 'faqs'));
    }

    public function calculateRent(Request $request)
    {
        $equipmentId = $request->input('equipment_id');
        $startDate = Carbon::parse($request->input('start_date'));
        $endDate = Carbon::parse($request->input('end_date'));

        // Calculate number of days
        $numberOfDays = $endDate->diffInDays($startDate);
        
        // Adjust for the case when start_date equals end_date
        if ($numberOfDays === 0) {
            $numberOfDays = 1; // At least 1 day of rental
        }

        list($type, $itemId) = explode('_', $equipmentId);
        
        if ($type === 'product') {
            $item = Product::find($itemId);
        } elseif ($type === 'set') {
            $item = Set::find($itemId);
        } else {
            return response()->json(['error' => 'Invalid request']);
        }

        // Calculate total cost based on number of days
        if ($numberOfDays <= 3) {
            $totalCost = $numberOfDays * $item->price_3_days;
        } else {
            $totalCost = $numberOfDays * $item->price_over_3_days;
        }

        return response()->json([
            'item' => $item->name,
            'type' => $type,
            'startDate' => $startDate->toDateString(),
            'endDate' => $endDate->toDateString(),
            'numberOfDays' => $numberOfDays,
            'totalCost' => $totalCost,
        ]);
    }


    public function submitApplication(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'car_model' => 'required|string',
            'equipment' => 'required|string',
            'first_date' => 'required|date',
            'last_date' => 'required|date|after_or_equal:first_date',
        ]);

        $application = Application::create($request->all());

        Mail::to(['evgenysimukhin@gmail.com', 'novokshonovrus@mail.ru', 'nnovokshonov@gmail.com', 'boxes55@mail.ru'])->send(new ApplicationSubmitted($application));

        return redirect('/#application')->with('success', 'Ваша заявка была успешно отправлена! Мы свяжемся с вами в ближайшее время!');
    }

    public function submitQwestion(Request $request)
    {
        $request->validate([
            'name' =>  'required|string',
            'phone' => 'required|string',
        ]);

        $question = Question::create($request->all());

        Mail::to(['evgenysimukhin@gmail.com', 'novokshonovrus@mail.ru', 'nnovokshonov@gmail.com', 'boxes55@mail.ru'])->send(new QuestionSubmitted($question));


        return redirect('/#contacts')->with('success_quest', 'Отлично! Мы перезвоним вам в ближайшее время!');
    }
}
