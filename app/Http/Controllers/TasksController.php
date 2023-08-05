<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
     * Display the specified resource.
     */
    public function show(Tasks $teams)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tasks $teams)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tasks $teams)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tasks $teams)
    {
        //
    }
}