<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceChargeStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tenant_name' => ['required', 'string', 'max:50'],
            'apartment' => ['required', 'string'],
            'status' => ['required', 'string'],
            'generator_fee' => ['nullable', 'numeric'],
            'nepa_light_fee' => ['nullable', 'numeric'],
            'sockaway_fee' => ['nullable', 'numeric'],
            'borehole_fee' => ['nullable', 'numeric'],
            'payment_date' => ['required', 'date'],
            'debt_amount' => ['nullable', 'date'],
            'debt_due_date' => ['nullable', 'date'],
            'charge_due_date' => ['required', 'date'],
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


