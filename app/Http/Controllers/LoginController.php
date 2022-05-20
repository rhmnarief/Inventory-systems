<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function loginPage(){
        return view('Login.login');
    }
    public function postLogin(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/home');
        }
        return redirect('/');
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
    public function register(Request $request){
        return view('Admin.register');
    }
    public function sendRegister(Request $request){
        User::create([
            'name' => $request -> name,
            'level' => 'admin',
            'email' => $request -> email,
            'password' => bcrypt($request -> password),
            'remember_token' => Str::random(60),
        ]);
        return redirect('register')->with('toast_success', 'Data Created Successfully!');
    }
    public function change(Request $request){
        return view('Admin.update');
    }
    public function update(Request $request){

        $request->validate([
            'old_password'=> 'required|min:6|max:100',
            'new_password'=> 'required|min:6|max:100',
            'confirm_password'=> 'required|min:6|max:100',
        ]);

        $current_user=auth()->user();

        if(Hash::check($request->old_password, $current_user->password)){
            User::find(auth()->user()->id)->update(['password'=> bcrypt($request->new_password)]);
            return redirect()->back()->with('toast_success', 'Password Changes Successfully');
        }else{
            return redirect('changePassword')->with('toast_error', 'Old Password does not match');
        }
      
    }
    
    

}
