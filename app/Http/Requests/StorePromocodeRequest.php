<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePromocodeRequest extends FormRequest
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
            'expires_at' => ['required', 'date', 'date_format:Y-m-d', 'after_or_equal:'.date('d-m-Y')],
            'code' => ['required', 'string', 'max:255', 'unique:promocodes,code'],
            'reward' => ['required', 'numeric', 'min:0'],
            'quantity' => ['required', 'numeric', 'min:1'],
            'description' => ['required', 'string'],
        ];
    }
}
