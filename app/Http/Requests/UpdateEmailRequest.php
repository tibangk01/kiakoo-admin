<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmailRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'old_email' => ['required', 'email'],
            'new_email' => ['required', 'email', 'unique:users,email'],
            'new_email_confirmation' => ['required', 'email', 'same:new_email'],
            'password' => ['required', 'min:8'],
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
