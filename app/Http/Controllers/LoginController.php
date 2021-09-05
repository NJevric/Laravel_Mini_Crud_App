<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
    
        $email = $request->email;
        $password = md5($request->pass);

        try{
            $user = Employee::where('email',$email)->where('password',$password)->first();

            if($user){
                $request->session()->put('user',$user);
                return redirect()->route('home.index');
            }
            return redirect()->route('home.index');
        }
        catch(\Exception $e){
            \Log::error($e->getMessage());
            return redirect()->route('home.index');
        }
    }

    public function logout(Request $request){
        try{
            $request->session()->remove('user');
            return redirect()->route('home.index');
        }
        catch(\Exception $e){
            \Log::error($e->getMessage());
            return redirect()->route('home.index');
        }
    }
}
