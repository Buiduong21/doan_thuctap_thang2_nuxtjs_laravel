<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRegister extends FormRequest
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
            'email'=>'required|email|unique:users',
            'password' =>'required|min:3',
            'name' =>'required|max:100|min:3',
        ];
    }

}