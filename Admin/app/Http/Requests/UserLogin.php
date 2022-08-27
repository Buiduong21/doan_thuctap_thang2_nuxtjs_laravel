<?php

namespace App\Http\Requests;

use Illuminate\Contracts\validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserLogin extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
       return [
            'email'=>'required|email',
            'password' =>'required|min:3'
        ];
    }

}