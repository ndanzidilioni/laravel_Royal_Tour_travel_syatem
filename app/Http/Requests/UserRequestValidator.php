<?php

namespace App\Http\Requests;

class UserRequestValidator extends Request
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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'name' => 'required|min:3|max:50',
                    'lastname' => 'required|min:5|max:50',
                    'nic' => 'required|min:10|max:10|regex:/^[0-9]{9}[vVxX]$/',
                    'email' => 'required|unique:users,email|email',
                    'age' => 'required',
                    'address' => 'required',
                    'hour_rate' => 'required',
                    'password' => 'required|min:8',
                    'basic' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    //'name' => 'required|min:3|max:50',
                    //'lastname' => 'required|min:5|max:50',
                    //'nic' => 'required|min:10|max:10|regex:/^[0-9]{9}[vVxX]$/',
                    //'email' => 'required|email',
                    'basic' => 'required',
                    'address' => 'required',
                    'hour_rate' => 'required',
                ];
            }
            default:
                return [];
                break;
        }
    }

}
