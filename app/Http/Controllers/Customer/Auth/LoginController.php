<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(){
//        dd('test');
        $title='Sign in';
        return view('frontend.customer.signin',compact('title'));
    }

    public function login(Request $request){
//        dd($request->all());
        $this->validator($request);
        if(Auth::guard('customers')->attempt($request->only('email','password'),$request->filled('remember'))){
            //Authentication passed...
            return redirect()->route('customers.home');
        }

        //Authentication failed...
        return $this->loginFailed();
    }


    public function logout(){
        Auth::guard('customers')->logout();
        return redirect()
            ->route('customers.login')
            ->with('status','Admin has been logged out!');
    }


    private function validator(Request $request){
        //validation rules.
        $rules = [
            'email'    => 'required|email|exists:customers|min:5|max:191',
            'password' => 'required|string|min:4|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'email.exists' => 'These credentials do not match our records.',
        ];

        //validate the request.
        $request->validate($rules,$messages);
    }


    private function loginFailed()
    {
        return redirect()
            ->back()
            ->withInput()
            ->with('error','Login failed, please try again!');
    }
}
