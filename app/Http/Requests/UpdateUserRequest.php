<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateUserRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users,email,' . $request->id,
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
            'address.required' => trans('admin.enter-address'),
            'phone.required' => trans('admin.enter-phone-number'),
        ];
    }
}
