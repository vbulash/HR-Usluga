<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route as Route;

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

Route::redirect('/', '/admin')->name('home');

// Маршруты объектов платформы
Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'MainController@index')->name('admin.index');
});

// Безопасность
Route::group(['namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'auth'], function () {
    // Пользователи
    Route::resource('/users', 'UserController');
    Route::get('/users.data', 'UserController@getData')->name('users.index.data');
});

// Аутентификация
Route::group(['namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'guest'], function () {
    Route::get('/login', 'UserController@loginForm')->name('login.create');
    Route::post('/login', 'UserController@login')->name('login');
});
Route::group(['namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'auth'], function () {
    Route::get('/logout', 'UserController@logout')->name('logout');
});

// Служебные маршруты
Route::get('/optimize-clear', function () {
    $exitCode = Artisan::call('optimize:clear');
    echo('Сделана полная оптимизация. Код завершения = '. $exitCode);
});
