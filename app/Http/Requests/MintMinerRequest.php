<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MintMinerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => [
                'required',
                'exists:user'
            ],
            'ore_amount' => [
                'required',
                'max:100'
            ]
        ];
    }
}
