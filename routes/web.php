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
Route::resource('testimonial', 'TestimonialController');
Route::resource('faq', 'FaqController');


// Learning laravel 
Route::get('/blog/{id}',function($number){
    return 'Blog Post ' . $number;
})->where([
    $id = '[0-9]+'
])->name('posts.show');


Route::get('/', [HomeController::class, 'index'])->name('home.index'); // Main Home Page
Route::get('/assignment', [AssignmentController::class, 'assignmentIndex'])->name('assignment.index');
Route::get('/assignment/new', [AssignmentController::class, 'assignmentNew'])->name('assignment.new');
Route::post('demos/sortabledatatable', [AssignmentController::class, 'updateOrder']);
Route::post('/assignment/store', [AssignmentController::class, 'assignmentStore'])->name('assignment.store');

// User profile data store using ajax
// Route::get('/my-profile', [UserController::class, 'create'])->name('user.profile.create');
// Route::get('/user/index', [UserController::class, 'index'])->name('user.profile.index');
// Route::get('/user/show/{id}', [UserController::class, 'show'])->name('user.profile.show');
// Route::post('/my-profile/store', [UserController::class, 'store'])->name('user.profile.store');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        // Route::get('/register', 'RegisterController@show')->name('register.show');
        // Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        // Route::get('/login', 'LoginController@show')->name('login.show');
        // Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth', 'permission']], function() {
        /**
         * Logout Routes
         */
        // Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        /**
         * User Routes
         */
        Route::group(['prefix' => 'users'], function() {
            Route::get('/', 'UsersController@index')->name('users.index');
            Route::get('/create', 'UsersController@create')->name('users.create');
            Route::post('/create', 'UsersController@store')->name('users.store');
            Route::get('/{user}/show', 'UsersController@show')->name('users.show');
            Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
            Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
            Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
        });

        /**
         * User Routes
         */
        Route::group(['prefix' => 'posts'], function() {
            Route::get('/', 'PostsController@index')->name('posts.index');
            Route::get('/create', 'PostsController@create')->name('posts.create');
            Route::post('/create', 'PostsController@store')->name('posts.store');
            Route::get('/{post}/show', 'PostsController@show')->name('posts.show');
            Route::get('/{post}/edit', 'PostsController@edit')->name('posts.edit');
            Route::patch('/{post}/update', 'PostsController@update')->name('posts.update');
            Route::delete('/{post}/delete', 'PostsController@destroy')->name('posts.destroy');
        });

    });
});
Route::resource('roles', RolesController::class);
Route::resource('categories', CategoryController::class);
Route::resource('permissions', PermissionsController::class);
