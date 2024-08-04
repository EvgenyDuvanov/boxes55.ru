<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\Application;
use App\Models\Product;
use App\Models\Question;
use App\Models\Review;
use App\Models\Set;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $totalUsers = User::count();
        $userMounth = User::where('created_at', '>=', Carbon::now()->subDays(30))->count();

        $totalApp = Application::count();
        $newApp = Application::where('status', Status::NEW->value)->count();
        $inProgressApp = Application::where('status', Status::IN_PROGRESS->value)->count();
        $closedApp = Application::where('status', Status::CLOSED->value)->count();

       return view('admin.index', compact('totalUsers', 'userMounth', 'totalApp', 'newApp', 'inProgressApp', 'closedApp'));
    }

    // public function index() {
    //     return view('admin.index');
    // }

    public function profileIndex()
    {
        return view('admin.profile.index');
    }

    public function clientsIndex()
    {
        $users = User::all();
        return view('admin.clients.index', compact('users'));
    }

    public function destroyClients($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.clients')->with('success', 'Пользователь успешно удален');
    }

    public function contractsIndex()
    {
        return view('admin.contracts.index');
    }

    public function productsIndex()
    {
        $products = Product::all();
        $sets = Set::all();

        return view('admin.products.index', compact('products', 'sets'));
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'info' => 'nullable|string',
            'price_3_days' => 'required|numeric',
            'price_over_3_days' => 'required|numeric',
        ]);

        $product->name = $request->name;
        $product->info = $request->info;
        $product->price_3_days = $request->price_3_days;
        $product->price_over_3_days = $request->price_over_3_days;

        $product->save();

        return redirect()->route('admin.products')->with('success', 'Изменения в товаре успешно сохранены!');
    }

    public function editSet($id)
    {
        $set = Set::findOrFail($id);
        return view('admin.sets.edit', compact('set'));
    }

    public function updateSet(Request $request, $id)
    {
        $set = Set::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'price_3_days' => 'required|numeric',
            'price_over_3_days' => 'required|numeric',
        ]);

        $set->name = $request->name;
        $set->price_3_days = $request->price_3_days;
        $set->price_over_3_days = $request->price_over_3_days;

        $set->save();

        return redirect()->route('admin.products')->with('success', 'Изменения в комплекте успешно сохранены!');
    }

    public function applicationIndex()
    {
        $applications = Application::orderBy('created_at', 'desc')->get();
        return view('admin.application.index', compact('applications'));
    }

    public function editApplication($id)
    {
        $application = Application::findOrFail($id);
        $statuses = Status::cases();
        return view('admin.application.edit', compact('application', 'statuses'));
    }

    public function updateApplication(Request $request, $id)
    {
        $application = Application::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:45',
            'phone' => 'required|string|max:15',
            'status' => ['required', Rule::in(array_keys(Status::select()))],
            'car_model' => 'required|string',
            'equipment' => 'required|string', 
            'first_date' => 'required|date',
            'last_date' => 'required|date|after_or_equal:first_date',
            'price' => 'nullable|string', 
        ]);

        $application->name = $request->name;
        $application->phone = $request->phone;
        $application->status = $request->status;
        $application->car_model = $request->car_model;
        $application->equipment = $request->equipment;
        $application->first_date = $request->first_date;
        $application->last_date = $request->last_date;
        $application->price = $request->price;

        $application->save();

        return redirect()->route('admin.application')->with('success', 'Заявка на аренду успешно обновлена');
    }

    public function destroyApplication($id)
    {
        $question = Application::findOrFail($id);
        $question->delete();

        return redirect()->route('admin.application')->with('success', 'Заявка на аренду успешно удалена');
    }

    public function consultationIndex()
    {
        $questions = Question::orderBy('created_at', 'desc')->get();
        return view('admin.consultation.index', compact('questions'));
    }

    public function editConsultation($id)
    {
        $question = Question::findOrFail($id);
        $statuses = Status::cases();
        return view('admin.consultation.edit', compact('question', 'statuses'));
    }

    public function updateConsultation(Request $request, $id)
    {
        $question = Question::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:25',
            'phone' => 'required|string|max:20',
            'status' => ['required', Rule::in(array_keys(Status::select()))],
            'comment' => 'nullable|string',
        ]);

        $question->name = $request->name;
        $question->phone = $request->phone;
        $question->status = $request->status;
        $question->comment = $request->comment;

        $question->save();

        return redirect()->route('admin.consultation')->with('success', 'Заявка успешно обновлена');
    }

    public function destroyConsultation($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->route('admin.consultation')->with('success', 'Заявка успешно удалена');
    }

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
