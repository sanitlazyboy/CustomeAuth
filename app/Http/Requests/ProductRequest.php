<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, mixed>
     */
    public function rules()
    {  
            if (request()->isMethod('put') || request()->is('*/edit'))
        {
            return [

            'product_name' => 'required',
            'category_name' => 'required',
            'product_dis' => 'required',
            'product_price' => 'required',
            'product_quantity' => 'required',
            ];
        }
        else{
            return [
            'product_name' => 'required',
            'category_name' => 'required',
            'product_dis' => 'required',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'product_image' => 'required',
            ];

        }
    }
}
