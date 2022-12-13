<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdCreateRequest extends Request
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

            'name' => 'required',

            'expense' => 'required|min:0|integer',

            'description' => 'required|between:1,150',


        ];
    }
}
