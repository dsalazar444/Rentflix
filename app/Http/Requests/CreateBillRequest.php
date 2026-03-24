<?php

// Made by: Daniela Salazar Amaya

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CreateBillRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'price' => 'required|numeric|min:0',
            'address' => 'required|string|max:300',
            'items' => 'required|array',
            'items.*.movie_id' => 'required|exists:movies,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        session(['lastForm' => 'billForm']);
        parent::failedValidation($validator);
    }
}
