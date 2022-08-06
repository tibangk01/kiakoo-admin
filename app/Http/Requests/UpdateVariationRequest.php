<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVariationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'state_id' =>['required', 'numeric'],
            'product_id' =>['required', 'numeric'],
            'packing_id' =>['required', 'numeric'],
            'sku' => ['nullable', 'string', 'max:255'],
            'name' =>['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'numeric', 'min:0'],
            'units_sold' => ['required', 'numeric', 'min:0'],
            'description' => ['required', 'string'],
            'is_published' => ['required', 'boolean'],
        ];
    }
}
