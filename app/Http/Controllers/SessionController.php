<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    //

    public function viewLogin()
    {

        return view('login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        $emp = Employee::where('email', '=', trim($request->email))->first();

        if ($emp) {
            if (Hash::check(trim($request->password), $emp->password)) {

                $request->session()->put('user', $emp['id']);
                $request->session()->put('user_type', $emp['admin']);
                if ($emp['admin']) {
                    return redirect('/adminDashboard');
                } else
                    return redirect('/profile');
                // return session('user');
            } else {
                return back()
                    ->withInput()
                    ->withErrors(['password' => 'Your password is incorrect']);
            }
        } else {
            return back()
                ->withInput()
                ->withErrors(['email' => 'Your email address does not exist! Contact Admin']);
        }
    }

    // public function loginAuth(Request $request){

    //     $this->validate($request,[
    //         'email' => "required|email",
    //         'password' => "required"
    //     ]);

    //     if(!Auth::attempt(['email'=>$request->email,'password'=>$request->password])){

    //         return "failed";


    //     }

    // }

    public function logout()
    {
        if (session()->has('user')) {
            session()->forget('user');
            return redirect('/');
        }
    }
}
