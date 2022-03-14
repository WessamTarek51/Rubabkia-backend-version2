<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class udateProductRequest extends FormRequest
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
            'name' => 'required|min:5',
            'price' =>  'required|gte:10',
            'description' => 'required|min:15',
            'category_id' => 'required',
        ];
    }
}
