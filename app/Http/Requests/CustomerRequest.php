<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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


    public function rules()
    {
        return [
           'fname'=>'required|regex:/^[a-zA-Z ]+$/',
           'lname'=>'required|regex:/^[a-zA-Z ]+$/',
           'email'=>'required|email|unique:customers',
           'mobile_number'=>'required|unique:customers|min:10',
           'password'=>'required',
           'cpassword'=>'required|same:password',
        ];
    }
}
