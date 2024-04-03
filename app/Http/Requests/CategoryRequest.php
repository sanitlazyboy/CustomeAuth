<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        if (request()->isMethod('put') || request()->is('*/edit'))
        {
            return [
                'category_name' => 'required',
                'category_dis' => 'required',
            ];
        }
        else{
            return [
                'category_name' => 'required',
                'category_dis' => 'required',
                'image' => 'required'
                ];

        }
    }
}
