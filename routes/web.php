<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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

// main and auth

Route::get('/', 'MainController@home')->name('/');

Auth::routes();

Route::get('/logout', function(){
    auth() ->logout();
    session() -> flush();

    return Redirect::to('/');
});

Route::get('/home', 'HomeController@index')->name('home');

// instructor

Route::get('/instructor/overview', 'InstructorController@index') -> name('instructor.index');
Route::get('/instructor/new', 'InstructorController@create') -> name('instructor.create');
Route::post('/instructor/store', 'InstructorController@store')-> name('instructor.store');
Route::get('instructor/{id}/edit', 'InstructorController@edit') -> name('instructor.edit');