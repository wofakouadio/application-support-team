<?php

use App\Http\Controllers\AdminController;
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
    return view('welcome');
});

Route::prefix("admin")->group(function(){
    Route::get('/dashboard', [AdminController::class, 'admin_dashboard']);
    Route::get('/teams', [AdminController::class, 'admin_teams']);
    Route::post('/new-team-member', [AdminController::class, 'admin_new_team_member']);
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
