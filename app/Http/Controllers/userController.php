<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Http\Requests\registerRequest;
use App\Models\bloodProvider;
use App\Models\User;
use Faker\Core\Blood;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function home(){
        $role = auth()->user()->role;
        $users = bloodProvider::latest()->get();
        return view('home',compact('role','users'));
    }
    //login templete
    public function login(){
        return view('login');
    }

    //register templete

    public function register(){
        return view('register');
    }

    //store new user data

    public function registering(registerRequest $request){
        $request->validated();
        if($request->password == $request->confpass){
            User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$request->password
            ]);
            return redirect()->route('login');
        }else{
            return redirect()->route('register')->with('error',"password doesn't match");
        }
    }
    public function log(loginRequest $request){
        $request->validated();
        $data = [
            'email'=>$request->email,
            'password'=>$request->password
        ];
        if(auth()->attempt($data)){
            return redirect()->route('home');
        }else{
            return redirect()->route('login')->with('error','user or password does not match');
        }
        }
        public function logout(){
            auth()->logout();
            return redirect()->route('login');
        }
}
