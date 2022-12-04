<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AssignmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index'); // Main Home Page
Route::get('/assignment', [AssignmentController::class, 'assignmentIndex'])->name('assignment.index');
Route::get('/assignment/new', [AssignmentController::class, 'assignmentNew'])->name('assignment.new');
Route::post('demos/sortabledatatable', [AssignmentController::class, 'updateOrder']);
Route::post('/assignment/store', [AssignmentController::class, 'assignmentStore'])->name('assignment.store');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



