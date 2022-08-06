<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiscountRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'variation_id' =>['required', 'numeric'],
            'quantity' => ['required', 'numeric', 'min:1'],
            'amount' => ['required', 'numeric', 'min:0', 'max:100'],
            'expires_at' =>['required', 'date', 'date_format:Y-m-d', 'after_or_equal:'.date('d-m-Y')],
            'is_daily_offer' => ['required', 'boolean'],
        ];
    }
}
