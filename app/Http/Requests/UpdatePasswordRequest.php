<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'old_password' => ['required', 'min:8'],
            'new_password' => ['required', 'min:8', 'different:old_password' ],
            'new_password_confirmation' => ['required', 'min:8', 'same:new_password'],
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
