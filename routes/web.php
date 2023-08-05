<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//login page
Route::get('/', function () {
    return view('auth.login');
});
//authenticate all routes
Auth::routes();
//logout user in session
Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

//Admin authentication through middleware
Route::middleware('admin')->prefix("admin")->group(function(){
    //dashboard page
    Route::get('/dashboard', [AdminController::class, 'admin_dashboard'])->name('admin.dashboard');
    //teams page
    Route::get('/teams', [AdminController::class, 'admin_teams']);
    // register new team through form submission
    Route::post('/new-team-member', [AdminController::class, 'admin_new_team_member']);
    // get specific team information into the edit form
    Route::get('/{team_id}/edit-team', [AdminController::class, 'admin_edit_team']);
    //update specific team information
    Route::put('/update-team', [AdminController::class, 'admin_update_team']);
    //delete specific team information
    Route::delete('/delete-team', [AdminController::class, 'admin_delete_team']);
    // show daily activities page
    Route::get('/daily-tasks', [AdminController::class, 'show_activities']);
//    view specific activity data
    Route::get('/task/{task_id}', [AdminController::class, 'show_activity']);
//    show activities report page
    Route::get('/tasks-reports', [AdminController::class, 'show_report_ui']);
//    post to get reports on activities
    Route::post('/tasks-reports', [AdminController::class, 'get_tasks_reports']);
});

//employee authentication through middleware
Route::middleware('employee')->prefix('employee')->group(function(){
//    dashboard page
    Route::get('/dashboard', [UserController::class, 'employee_dashboard'])->name('employee.dashboard');
//    activities page
    Route::get('/tasks', [UserController::class, 'employee_tasks']);
//    post new activity
    Route::post('/tasks/new-task', [TasksController::class, 'store']);
//    view specific activity data in edit form page
    Route::get('/tasks/{task_id}/edit-task', [TasksController::class, 'edit']);
//    update specific activity data
    Route::put('/tasks/update-task', [TasksController::class, 'update']);
//    delete specific activity data
    Route::delete('/tasks/delete-task', [TasksController::class, 'destroy']);
});
