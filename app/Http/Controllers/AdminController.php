<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    //
    public function admin_dashboard(){
        return view('admin.dashboard', [
            'daily_count_activities' => Tasks::whereDate('created_at', date('Y-m-d'))->count(),
            'daily_count_submitted' => Tasks::whereDate('created_at', date('Y-m-d'))->where('status', 0)->count(),
            'daily_count_pending' => Tasks::whereDate('created_at', date('Y-m-d'))->where('status', 1)->count(),
            'daily_count_done' => Tasks::whereDate('created_at', date('Y-m-d'))->where('status', 2)->count(),
            'count_activities' => Tasks::all()->count(),
            'count_submitted' => Tasks::where('status', 0)->count(),
            'count_pending' => Tasks::where('status', 1)->count(),
            'count_done' => Tasks::where('status', 2)->count()
        ]);
    }

    public function admin_teams(){
        return view('admin.teams',[
            'teams' => User::where('user_type', 0)->latest()->get()
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

        //check if updated
        if(!$UpdateTeamMemberQuery){
            Alert::warning('Notification', 'Employee data was unable to be updated');
            return back();
        }else{
            Alert::success('Notification', 'Employee data updated successfully');
            return redirect('/admin/teams');
        }
    }

    //delete team member data
    public function admin_delete_team(Request $request){
        $DeleteTeamQuery = DB::table('users')->where('id', $request['team_id'])->delete();
        if(!$DeleteTeamQuery){
            Alert::warning('Notification', 'Employee data was unable to be deleted');
            return back();
        }else{
            Alert::success('Notification', 'Employee data deleted successfully');
            return redirect('/admin/teams');
        }
    }

    public function show_activities(){
        return view('/admin/tasks-view',
        [
            'tasks' => Tasks::whereDate('created_at', date('Y-m-d'))->get()
        ]);
    }

    public function show_activity(Request $request){
        return view('/admin/task',
            [
                'task' => Tasks::find($request['task_id'])
            ]);
    }

    public function show_report_ui(){
        return view('/admin/reports', ['reports' => '']);
    }

    public function get_tasks_reports(Request $request){
        $reportDate = $request->validate([
            'starting-date' => 'required',
            'ending-date' => 'required'
        ]);

        $start_date = Carbon::createFromFormat('Y-m-d', $reportDate['starting-date']);
        $end_date = Carbon::createFromFormat('Y-m-d', $reportDate['ending-date']);
        $reports = '';
        $reports = Tasks::whereBetween('created_at', [$start_date, $end_date])->get();

        return view('admin/reports', ['reports' => $reports]);
    }
}
