<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class AdminController extends Controller
{
    //
    public function admin_dashboard(){
        return view('admin.dashboard');
    }

    public function admin_teams(){
        return view('admin.teams',[
            'teams' => User::latest()->get()
        ]);
    }

    public function admin_new_team_member(Request $request){
        $NewTeamMember = $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'dob' => 'required',
            'gender' => 'required',
            'marital_status' => 'required'
        ]);
        //custom email
        $NewTeamMember['email'] = $NewTeamMember['fname'].$NewTeamMember['lname'].'@mail.com';
        //default password
        $NewTeamMember['password'] = bcrypt('password');
        //default role name
        $NewTeamMember['role_name'] = 'Employee';
        //convert first and last name into uppercase
        $NewTeamMember['fname'] = strtoupper($NewTeamMember['fname']);
        $NewTeamMember['lname'] = strtoupper($NewTeamMember['lname']);

        //check if mail in system
        if(User::where('email', $NewTeamMember['email'])->exists()){
            Alert::error('Notification', 'Employee already exists');
            return back();
        }else{
            User::create($NewTeamMember);
            Alert::success('Notification', 'New Employee registered successfully.  Email : ' . $NewTeamMember['email'] .' Password : password ');
            return redirect('/admin/teams');
        }
    }
}
