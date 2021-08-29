<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
        $rules = [
            'banner_id' => 'nullable',
            'name' =>'required|string',
            'category_id' => 'nullable',
            'price' => 'required',
            'description' => 'required|max:50',
            'discount' => 'required',
            'photo' => 'required',
            'is_soldout' => 'nullable',
            'is_hot' => 'nullable',
            'size_id.*' => 'required',
            'size_id.*.status' => 'nullable',
        ];

        return $rules;
    }
}
