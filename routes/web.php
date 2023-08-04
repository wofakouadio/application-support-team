<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::post('/login', [LoginController::class, 'login'])->name('auth.login');

Route::middleware(['auth', 'user-access:admin'])->prefix("admin")->group(function(){
    Route::get('/dashboard', [AdminController::class, 'admin_dashboard'])->name('admin.dashboard');
    Route::get('/teams', [AdminController::class, 'admin_teams']);
    Route::post('/new-team-member', [AdminController::class, 'admin_new_team_member']);
    Route::get('/{team_id}/edit-team', [AdminController::class, 'admin_edit_team']);
    Route::put('/update-team', [AdminController::class, 'admin_update_team']);
    Route::delete('/delete-team', [AdminController::class, 'admin_delete_team']);
});

Route::middleware(['auth', 'user-access:employee'])->prefix('employee')->group(function(){
    Route::get('/dashboard', [UserController::class, 'employee_dashboard'])->name('employee.dashboard');
    Route::get('/tasks', [UserController::class, 'employee_tasks']);
});



//Route::get('/dashboard', function (){
//   return view('admin/dashboard');
//});
//
//Route::get("/teams", function (){
//   return view('admin/teams');
//});

//Route::get('/login', function (){
//    return view('auth/login');
//});

//Auth::routes();
//
//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
