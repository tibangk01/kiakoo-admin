<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegularEmployeeRequest extends FormRequest
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
            'roles' => ['nullable'],
            'last_name' => ['required'],
            'civility_id' => ['required'],
            'first_name' => ['required'],
            'phone_number' => ['required', 'unique:contacts,value'],
            'work_id' => ['required'],
            'email' => ['required', 'unique:users,email'],
            'status' => ['required'],
            'address' => ['nullable', 'max:255']
        ];
    }
}
