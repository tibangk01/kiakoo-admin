<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVoucherRequest extends FormRequest
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
            'expires_at' =>['required', 'date', 'date_format:Y-m-d', 'after_or_equal:'.now()],
            'amount' => ['required', 'numeric', 'min:1'],
            'discount' => ['required', 'numeric', 'min:1', 'max:100'],
            'description' => ['required', 'string', 'max:255'],
        ];
    }
}
