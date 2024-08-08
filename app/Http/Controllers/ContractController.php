<?php

namespace App\Http\Controllers;

use App\Enums\StatusContract;
use App\Http\Requests\ContractRequest;
use App\Models\Contract;
use App\Models\Product;
use App\Models\Set;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;

class ContractController extends Controller
{
    public function index()
    {
        $contracts = Contract::all();
        return view('admin.contracts.index', compact('contracts'));
    }

    public function create()
    {

        $products = Product::all();
        $sets = Set::all();

    return view('admin.contracts.create', compact('products', 'sets'));
    }

    public function store(ContractRequest $request)
    {
        $validated = $request->validated();

        Contract::create($validated);

        return redirect()->route('admin.contracts')->with('success', 'Договор успешно создан!');
    }

   public function edit($id)
    {
        $contract = Contract::findOrFail($id);
        $products = Product::all();
        $sets     = Set::all();
        $statuses = StatusContract::cases();

        return view('admin.contracts.edit', compact('contract', 'products', 'sets', 'statuses'));
    }

    public function update(ContractRequest $request, $id)
    {
        $contract = Contract::findOrFail($id);
        $validated = $request->validated();

        $contract->update($validated);

        return redirect()->route('admin.contracts')->with('success', 'Данные договора успешно обновлены!');
    }

    public function destroy(Contract $contract)
    {
        $contract->delete();

        return redirect()->route('admin.contracts')->with('success', 'Договор был успешно удален!');
    }

    // public function downloadWord($id)
    // {
    //     $contract = Contract::findOrFail($id);

    //     // Путь к шаблону
    //     $templatePath = storage_path('app/templates/contract_template.docx');

    //     // Создание экземпляра TemplateProcessor
    //     $templateProcessor = new TemplateProcessor($templatePath);

    //     // Замена меток на данные из базы
    //     $templateProcessor->setValue('first_name', $contract->first_name);
    //     $templateProcessor->setValue('last_name', $contract->last_name);
    //     $templateProcessor->setValue('birth_date', $contract->birth_date->format('d.m.Y'));
    //     $templateProcessor->setValue('phone', $contract->phone);
    //     $templateProcessor->setValue('passport', $contract->passport);
    //     $templateProcessor->setValue('passport_issued_date', $contract->passport_date->format('d.m.Y'));
    //     $templateProcessor->setValue('passport_issued_by', $contract->passport_by);
    //     $templateProcessor->setValue('address', $contract->address);
    //     $templateProcessor->setValue('first_date', $contract->first_date->format('d.m.Y'));
    //     $templateProcessor->setValue('last_date', $contract->last_date->format('d.m.Y'));
    //     $templateProcessor->setValue('equipment', $contract->equipment);
    //     $templateProcessor->setValue('price', $contract->price);
    //     $templateProcessor->setValue('total_days', $contract->total_days);
    //     $templateProcessor->setValue('status', $contract->status);

    //     // Сохранение документа во временный файл
    //     $tempFile = tempnam(sys_get_temp_dir(), 'doc');
    //     $templateProcessor->saveAs($tempFile . '.docx');

    //     return response()->download($tempFile . '.docx')->deleteFileAfterSend(true);
    // }
}
