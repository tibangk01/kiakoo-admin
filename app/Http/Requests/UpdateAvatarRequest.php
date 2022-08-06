<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAvatarRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'avatar' => ['required', 'image', 'mimes:jpg,png,jpeg,webp', 'max:3072'],
        ];
    }
}
