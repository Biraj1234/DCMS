<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable;

use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm(){
//        dd('test');
        $title='Sign in';
        return view('frontend.customer.signin',compact('title'));
    }

    public function login(Request $request){
        //        dd($request->all());

//        $email=$request->email;
//        $password=$request->password;
//        $data['info'] = Customer::where('email',$email)->first();
//        if ($email == $data['info']->email){
//            if (password_verify($password, $data['info']->password)) {
//                return view('frontend.');
//            } else {
//                dd('failed');
//            }
//        } else{
//            customer.login
//        }
//
//        if(Auth::attempt(['email'=>$email,'password'=>$password]))
//        {
//            dd('Hello');
//            return redirect()->intended('frontend.home.index');
//        } else{
//            dd('Fail');
//        }


        $this->validator($request);
        if(Auth::guard('customers')->attempt($request->only('email','password'),$request->filled('remember'))){
            //Authentication passed...
            return redirect()->route('frotend.customer.signin');
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
