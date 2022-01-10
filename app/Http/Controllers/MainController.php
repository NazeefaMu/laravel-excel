<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MainController extends Controller
{
    //
    function index(){
        return view('login');
    }
    function checklogin(Request $request){
        $this->validate($request,[
            'email'=> 'required|email',
            'password'=> 'required|alphaNum|min:3'
        ]);

        $user_data=array(
        'email'=>$request->get('email'),
        'password'=>$request->get('password'),
        );
        if(Auth::attempt($user_data)){
            return redirect('main/successlogin');
        }
        else {
            return back()->with('error','Invalid credentials');
        }
    }
    function successlogin(){
        return view('successlogin');
    }
}
