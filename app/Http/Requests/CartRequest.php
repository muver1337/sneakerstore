<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
{

    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required',
            'sneaker_id'  => 'required|max:255',
            'size' => 'required|max:4',
            'cost' => 'required',
        ];
    }
}
