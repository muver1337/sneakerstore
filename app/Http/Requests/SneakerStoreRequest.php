<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SneakerStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        $user = $this->user();

        return $user !== null && $user->tokenCan('create');
    }

    public function rules(): array
    {
        return [
            'brand_id' => 'required',
            'model' => 'required|max:255',
            'size' => 'required',
            'cost'=>'required',
        ];
    }
}

