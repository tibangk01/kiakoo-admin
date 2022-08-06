<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVariationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'state_id' =>['required', 'numeric'],
            'product_id' =>['required', 'numeric'],
            'packing_id' =>['required', 'numeric'],
            'sku' => ['nullable', 'string', 'max:255', 'unique:variations,sku'],
            'name' =>['required', 'string', 'max:255', 'unique:variations,name'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'numeric', 'min:0'],
            'units_sold' => ['required', 'numeric', 'min:0'],
            'description' => ['required', 'string'],
            'is_published' => ['required', 'boolean'],
        ];
    }
}
