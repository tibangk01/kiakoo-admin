<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'taxon_child_id' => ['required', 'numeric'],
            'brand_id' => ['required', 'numeric'],
            'properties' => ['required', 'array'],
        ];
    }
}
