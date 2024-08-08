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
}
