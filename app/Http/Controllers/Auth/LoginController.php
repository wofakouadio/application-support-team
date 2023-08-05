<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }

    public function login(Request $request){
        $LoginData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($LoginData)){
            $role = Auth::user()->user_type;
            switch ($role){
                case 1:
                    $request->session()->regenerate();
                    Alert::success('Notification', 'Login successfully as Admin');
                    return redirect()->route('admin.dashboard');
                    break;
                case 0:
                    $request->session()->regenerate();
                    Alert::success('Notification', 'Login successfully as Employee');
                    return redirect()->route('employee.dashboard');
                    break;
                default:
                    Auth::logout();
                    Alert::error('Notification', 'Login wrong');
                    return redirect()->route('auth.login')->withErrors(['email', 'Something went wrong']);
            }
        }else{
            Alert::error('Notification', 'Something went wrong');
            return back()->with(['email', 'Something went wrong']);
        }
    }

    //logout
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Alert::success('Notification', 'You\'ve been logged out successfully');
        return redirect('/login');
    }
}
