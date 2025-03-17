<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function register(RegisterRequest $request){
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ]);
        return redirect()->back()->with('success', 'User Successfully registered');
    }

    public function login(Request $request){
        $data = $request->validate([
            'logemail'=>'required',
            'logpassword'=>'required'
        ]);

        if(auth()->attempt(['email'=>$data['logemail'],'password'=>$data['logpassword']])){
            $request->session()->regenerate();
        }
        else{
            return redirect()->back()->with('error','Wrong Credetials');
        }

        return redirect('/');
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
