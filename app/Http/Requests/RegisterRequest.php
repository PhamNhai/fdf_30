<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'address' => 'required',
            'phone' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('admin.enter-name'),
            'email.required' => trans('admin.enter-email'),
            'email.unique' => trans('admin.email-exist'),
            'password.required' => trans('admin.enter-password'),
            'password.confirmed' => trans('admin.password-not-match'),
            'password.min' => trans('admin.password-too-short'),
            'address.required' => trans('admin.enter-address'),
            'phone.required' => trans('admin.enter-phone-number'),
        ];    
    }
}
