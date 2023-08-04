<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;

class LoginController extends Controller
{
    //
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $LoginData = $request->validate([
           'email' => 'required|email',
           'password' => 'required'
        ]);

        if(auth()->attempt([
            'email' => $LoginData['email'],
            'password' => $LoginData['password']
            ])){
            if(auth()->user()->user_type === 'admin'){
                Alert::success('Notification', 'Login successfully as Admin');
//                return redirect('/admin/dashboard');
                return redirect()->route('admin.dashboard');
            }elseif(auth()->user()->user_type === 'employee'){
                Alert::success('Notification', 'Login successfully as Employee');
//                return redirect('/employee/dashboard');
                return redirect()->route('employee.dashboard');
            }else{
                Alert::error('Notification', 'Something went wrong');
                return back()->with(['email', 'Something went wrong']);
            }
        }
    }
}
