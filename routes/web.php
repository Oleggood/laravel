<?php

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

//пользователи - так не делать (см.нижнюю)!:
Route::get('admin/users', 'App\Http\Controllers\UserController@index')->name('users');
Route::get('admin/users/create', 'App\Http\Controllers\UserController@create')->name('user_create');
Route::post('admin/users', 'App\Http\Controllers\UserController@store')->name('user.store');
Route::get('admin/users/{userId}', 'App\Http\Controllers\UserController@show')->name('user.show');
Route::get('admin/users/{userId}/edit', 'App\Http\Controllers\UserController@edit')->name('user.edit');
Route::patch('admin/users/{userId}', 'App\Http\Controllers\UserController@update')->name('user.update');
Route::delete('admin/users/{userId}', 'App\Http\Controllers\UserController@destroy')->name('user.destroy');

//Роли - так не делать (см.нижнюю)!:
Route::get('admin/roles', 'App\Http\Controllers\RoleController@index')->name('roles');
Route::get('admin/roles/create', 'App\Http\Controllers\RoleController@create')->name('role.create');
Route::post('admin/roles', 'App\Http\Controllers\RoleController@store')->name('role.store');
Route::get('admin/roles/{roleId}', 'App\Http\Controllers\RoleController@show')->name('role.show');
Route::get('admin/roles/{roleId}/edit', 'App\Http\Controllers\RoleController@edit')->name('role.edit');
Route::patch('admin/roles/{roleId}', 'App\Http\Controllers\RoleController@update')->name('role.update');
Route::delete('admin/roles/{roleId}', 'App\Http\Controllers\RoleController@destroy')->name('role.destroy');

//Подразделения, группировка машрутов + префикс (к путям и именам) - так не делать (см.нижнюю)!:
use App\Http\Controllers\DepartmentController;

Route::controller(DepartmentController::class)->prefix('admin/departments')->name('departments.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{department}', 'show')->name('show');
    Route::get('/{department}/edit', 'edit')->name('edit');
    Route::patch('/{department}', 'update')->name('update');
    Route::delete('/{department}', 'destroy')->name('destroy');
});


//Должности, группировка метод route resource - правильный вариант:
use App\Http\Controllers\PositionController;
Route::resource('admin/positions', PositionController::class);

//Задачи:
use App\Http\Controllers\TaskController;
Route::resource('task', TaskController::class);

//Статусы задач:
use App\Http\Controllers\StatusController;
Route::resource('status', StatusController::class);


