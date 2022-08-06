<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'work_id' => ['required', 'numeric'],
            'gender_id' => ['required', 'numeric'],
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'address' => ['nullable', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:25', 'unique:employees,phone_number'],
            'email' => ['required', 'email'],
            'role' => ['nullable'],
            'permission' => ['nullable'],
            'authorized_to_log_in' => ['required', 'numeric'],
        ];
    }
}
