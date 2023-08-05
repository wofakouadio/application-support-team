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
        return view('employee.dashboard');
    }

    public function employee_tasks(){
        return view('employee.tasks',[
            'tasks' => Auth::user()->tasks()->get()
        ]);
    }
}
