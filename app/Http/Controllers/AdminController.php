<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    //store new team/user
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

    //view team data in edit page
    public function admin_edit_team(Request $request){
        return view('admin.edit-team',[
            'teams' => User::latest()->get(),
            'team' => User::find($request['team_id'])
        ]);
    }

    //update team data from edit page
    public function admin_update_team(Request $request){
        $UpdateTeamMember = $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'dob' => 'required',
            'gender' => 'required',
            'marital_status' => 'required'
        ]);

        $UpdateTeamMember['fname'] = strtoupper($UpdateTeamMember['fname']);
        $UpdateTeamMember['lname'] = strtoupper($UpdateTeamMember['lname']);

        $UpdateTeamMemberQuery = DB::table('users')->where('id', $request['team_id'])->update([
            'fname' => $UpdateTeamMember['fname'],
            'lname' => $UpdateTeamMember['lname'],
            'dob' => $UpdateTeamMember['dob'],
            'gender' => $UpdateTeamMember['gender'],
            'marital_status' => $UpdateTeamMember['marital_status']
        ]);

        //check if mail in system
        if(!$UpdateTeamMemberQuery){
            Alert::warning('Notification', 'Employee data was unable to be updated');
            return back();
        }else{
            Alert::success('Notification', 'Employee data updated successfully');
            return redirect('/admin/teams');
        }
    }


}
