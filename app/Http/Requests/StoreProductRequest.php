<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:products,name'],
            'taxon_child_id' => ['required', 'numeric'],
            'brand_id' => ['required', 'numeric'],
            'properties' => ['required', 'array'],
        ];
    }
}
