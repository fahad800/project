<?php

namespace App\Http\Controllers;

use App\Http\Requests\saveeditRequest;
use App\Http\Requests\saveUserRequest;
use App\Models\bloodProvider;
use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    public function home(){
        $user = bloodProvider::get();
        return view('admin.home',compact('user'));
    }
    public function addprovider(){
        return view('admin.adduser');
    }
    public function usersave(saveUserRequest $request){
        $request->validated();
        bloodProvider::create([
            'name'=>$request->name,
            'blood_group'=>$request->blood_group,
            'date'=>$request->date,
            'quantity'=>$request->quantity
        ]);
        return redirect()->route('admin.home');

    }
    public function userdelete($id){
        $id = decrypt($id);
        bloodProvider::where('id',$id)->delete();
        return redirect()->route('admin.home');
    }
    public function edituser($id){
        $id = decrypt($id);
        $provider =  bloodProvider::where('id',$id)->first();
        return view('admin.useredit',compact('provider'));
    }
    public function saveedit($id,saveeditRequest $request){
        $id = decrypt($id);
        bloodProvider::where('id',$id)->update([
            'name'=>$request->name,
            'blood_group'=>$request->blood_group,
            'date'=>$request->date,
            'quantity'=>$request->quantity
        ]);
        return redirect()->route('admin.home');

    }
}
