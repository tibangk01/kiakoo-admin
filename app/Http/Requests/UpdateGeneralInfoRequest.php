<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGeneralInfoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'min:2'],
        ];
    }

    // redirect immediatly when validation error occurs
    public function withValidator($validator)
    {
        if ($validator->fails()) {
            return redirect(route('profile.show'));
        }
    }
}
