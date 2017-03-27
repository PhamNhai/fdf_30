<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductRequest extends FormRequest
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
        if ($request->isMethod('post')) {
            return [
                'name' => 'required|unique:products|max:255',
                'price' => 'required|numeric',
                'description' => 'required',
                'quantity' => 'required',
            ];
        }
        return [
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'description' => 'required',
            'quantity' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('admin.enter-name'),
            'name.unique' => trans('admin.name-exist'),
            'name.max' => trans('admin.name-max'),
            'price.required' => trans('admin.enter-price'),
            'description.required' => trans('admin.enter-description'),
            'quantity.required' => trans('admin.enter-quantity'),
            'price.numeric' => trans('admin.price-number'),
        ];
    }
}
