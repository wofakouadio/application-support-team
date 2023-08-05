<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tasks;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('employee');
    }
    public function employee_dashboard(){
        return view('employee.dashboard', [
            'daily_count_activities' => Tasks::where('user_id', Auth::user()->id)->whereDate('created_at', date('Y-m-d'))->count(),
            'daily_count_submitted' => Tasks::where('user_id', Auth::user()->id)->whereDate('created_at', date('Y-m-d'))->where('status', 0)->count(),
            'daily_count_pending' => Tasks::where('user_id', Auth::user()->id)->whereDate('created_at', date('Y-m-d'))->where('status', 1)->count(),
            'daily_count_done' => Tasks::where('user_id', Auth::user()->id)->whereDate('created_at', date('Y-m-d'))->where('status', 2)->count(),
            'count_activities' => Tasks::where('user_id', Auth::user()->id)->count(),
            'count_submitted' => Tasks::where('user_id', Auth::user()->id)->where('status', 0)->count(),
            'count_pending' => Tasks::where('user_id', Auth::user()->id)->where('status', 1)->count(),
            'count_done' => Tasks::where('user_id', Auth::user()->id)->where('status', 2)->count()
        ]);
    }

    public function employee_tasks(){
        return view('employee.tasks',[
            'tasks' => Auth::user()->tasks()->get()
        ]);
    }
}
