<?php

use Aigletter\App\Controllers\UserController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('home/', [App\Http\Controllers\HomeController::class, 'index'])
->name('home.index');

Route::prefix('user')->group(function(){
    Route::post('register/{userName}', [App\Http\Controllers\UsersController::class, 'register'])
        ->where('userName','\w{3,10}')
        ->name('user.register');
        Route::post('login/{userName}', [App\Http\Controllers\UsersController::class, 'login'])
        ->where('userName','\w{3,10}')
        ->name('user.login');   
        Route::post('delete/{userName}', [App\Http\Controllers\UsersController::class, 'delete'])
        ->where('userName','\w{3,10}')
        ->name('user.delete');    
        Route::get('show/{userName}', [App\Http\Controllers\UsersController::class, 'show'])
        ->where('userName','\w{3,10}')
        ->name('user.show');                 
});

Route::resource('task', TaskController::class);

