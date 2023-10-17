<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RemittanceUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tenant_name' => ['required', 'string', 'max:50'],
            'apartment' => ['required', 'string'],
            'status' => ['required', 'string'],
            'rent_fee' => ['required', 'numeric'],
            'amount_paid' => ['required', 'numeric'],
            'payment_date' => ['required', 'date'],
            'debt_amount' => ['nullable', 'numeric'],
            'debt_due_date' => ['nullable', 'date'],
            'rent_due_date' => ['required', 'date'],
            'payment_method' => ['required', 'string'],
            'payment_proof' => ['file', 'mimes:jpeg,png,jpg,pdf', 'max:5120', 'nullable'],
            'notes' => ['string', 'max:100', 'nullable'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field may not be greater than :max characters.',
            'integer' => 'The :attribute must be an integer.',
            'numeric' => 'The :attribute must be a number.',
            'min' => 'The :attribute must be at least :min.',
            'in' => 'The selected :attribute is invalid.',
            'email' => 'Invalid email format.',
            'unique' => 'The :attribute has already been taken.',
        ];
    }
}
