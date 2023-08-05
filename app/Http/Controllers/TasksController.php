<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class TasksController extends Controller
{

    public function __construct()
    {
        $this->middleware('employee');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $FormData = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $FormData['name'] = strtoupper($FormData['name']);
        $FormData['user_id'] = $request['user_id'];
        try {
            Tasks::create($FormData);
            Alert::success('Notification', 'New Activity/Task created successfully.');
            return redirect('/employee/tasks');
        }catch (\Exception $e){
            Alert::danger('Notification', 'New Activity/Task creation has failed.'.$e->getMessage());
            return back();
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        return view(
            'employee.edit-task',
            [
                'SingleTask' => DB::table('tasks')->select('id', 'name', 'description', 'status', 'remarks')->where('id', $request['task_id'])->first(),
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $UpdateTask = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'remarks' => 'required'
        ]);

        try {
            DB::table('tasks')->where('id', $request['task_id'])->update([
                'name' => $UpdateTask['name'],
                'description' => $UpdateTask['description'],
                'status' => $UpdateTask['status'],
                'remarks' => $UpdateTask['remarks'],
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            Alert::success('Notification', 'Activity/Task updated successfully.');
            return redirect('/employee/tasks');
        }catch (\Exception $e){
            Alert::danger('Notification', 'Activity/Task creation update failed.'.$e->getMessage());
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            DB::table('tasks')->where('id', $request['task_id'])->delete();
            Alert::success('Notification', 'Activity/Task deleted successfully.');
            return redirect('/employee/tasks');
        }catch (\Exception $e){
            Alert::danger('Notification', 'Activity/Task creation delete failed.'.$e->getMessage());
            return back();
        }
    }
}
