<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
                return redirect()->route('employee.dashboard');
            }else{
                Alert::error('Notification', 'Something went wrong');
                return back()->with(['email', 'Something went wrong']);
            }
        }else{
            Alert::error('Notification', 'Something went wrong');
            return back()->with(['email', 'Something went wrong']);
        }
    }
}
