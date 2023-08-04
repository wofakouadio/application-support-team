<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function employee_dashboard(){
        return view('employee.dashboard');
    }

    public function employee_tasks(){
        return view('employee.tasks');
    }
}
