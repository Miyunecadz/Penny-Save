<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function check(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        $userInfo = User::where('username','=',$request->username)->first();
        
        
        if(!$userInfo){
            return back()->with('fail','We do not recognize your username');
        }
        else{
            if($request->password == $userInfo->password){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect()->route('dashboard');
            }
            else{
                return back()->with('fail','Incorrect password');
            }
        }

    }

}
