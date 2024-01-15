<?php

namespace App\Http\Requests;

use Illuminate\Http\FormRequest;

class LoginFormRequest extends FormRequest;
{
    /**
     * 
     */
    protected function authorize()
    {
        return true;
    }

    protected function rules()
    {
        return [
                'email' => 'required',
                'password' =>'required|min:8|same:password_confirmation'
        ];
    }

}
