<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(){
        $title='Sign in';
        return view('frontend.customer.signin',compact('title'));
    }

    public function login(Request $request){
//        dd($request->all());
        $this->validator($request);
        if(Auth::guard('customer')->attempt($request->only('email','password'),$request->filled('remember'))){
            //Authentication passed...
            return redirect()->route('room_owner.home');
        }

        //Authentication failed...
        return $this->loginFailed();
    }


    public function logout(){
        Auth::guard('customer')->logout();
        return redirect()
            ->route('room_owner.login')
            ->with('status','Admin has been logged out!');
    }


    private function validator(Request $request){
        //validation rules.
        $rules = [
            'email'=> 'required|exists:customers|min:5|max:191',
            'password'=> 'required'
        ];

        //custom validation error messages.
        $messages = [
            'email.exists' => "These credentials didn't match our records. Please try again",
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
