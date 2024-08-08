<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'middle_name'   => 'nullable|string|max:255',
            'birth_date'    => 'required|date_format:Y-m-d',
            'phone'         => 'required|string|max:20',
            'passport'      => 'required|string|max:50',
            'passport_date' => 'nullable|date_format:Y-m-d',
            'passport_by'   => 'nullable|string|max:255',
            'address'       => 'required|string|max:255',
            'first_date'    => 'required|date_format:Y-m-d',
            'last_date'     => 'required|date_format:Y-m-d',
            'equipment'     => 'required|string|max:255',
            'price'         => 'nullable|numeric|min:0',
            'total_days'    => 'nullable|integer|min:0',
            'status'         => ['required', 'in:new,moderation,approved,refusal,in_progress,closed'],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required'   => 'Имя обязательно для заполнения.',
            'last_name.required'    => 'Фамилия обязательна для заполнения.',
        ];
    }
}
