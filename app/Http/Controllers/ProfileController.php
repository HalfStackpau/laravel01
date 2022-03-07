<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;


class ProfileController extends Controller
{
   function __construct(){
        $this->middleware('auth');
   }

   function admin(){
       $this->middleware('role',['role'=>'admin']);
        return view('admin');
   }

    function index(){
       return view('profile',['user'=>Auth::user()]);
   }

   function  updatePassword(Request $request,User $user){
        $validatedData=$this->validate($request,[
            'oldpassword'=>'required',
            'password' => 'required|confirmed|min:6'
        ]);

       $hashedPassword = Auth::user()->password;

       if (Hash::check($request->oldpassword , $hashedPassword ))
       {
            if (!Hash::check($request->password , $hashedPassword)) {

              $users =User::find(Auth::user()->id);
              $users->password = Hash::make($request->password);
              User::where( 'id' , Auth::user()->id)->update([ 'password' =>  $users->password]);

              session()->flash('message','password updated successfully');
              return redirect()->back();
            }
            else{
                  session()->flash('message','new password can not be the old password!');
                  return redirect()->back();
            }

        }
        else{
               session()->flash('message','old password doesnt matched ');
               return redirect()->back();
        }

    }
}

