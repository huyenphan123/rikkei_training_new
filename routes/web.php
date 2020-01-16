<?php

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

use Illuminate\Http\Request;


Auth::routes(['verify' => true]);

//Route::get('test', function () {
//    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
//    $pass = array(); //remember to declare $pass as an array
//    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
//    for ($i = 0; $i < 8; $i++) {
//        $n = rand(0, $alphaLength);
//        $pass[] = $alphabet[$n];
//    }
//    echo implode($pass);
//});


Route::get('test', function () {
    return view('home');
})->name('test');


Route::get('/login', 'Auth\LoginController@getLogin')->name('login');

Route::post('/login', 'Auth\LoginController@postLogin')->name('users.login');


Route::group(['middleware' => ['check.login']], function () {
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('/changepass', 'ChangePasswordController@changePass')->name('changepass');
    Route::post('/changepass', 'ChangePasswordController@store');

//    Route::middleware('check.first.login')->group(function () {

    Route::group(['namespace' => 'Admin'], function () {
        Route::group(['prefix' => 'staffs'], function () {
            Route::get('/', 'StaffController@index')->name('staffs.index');
//            Route::get('/abc', function (Request $request) {
//            })->name('staffs.abc');

            Route::get('/create', 'StaffController@create')->name('staffs.create');
            Route::post('/create', 'StaffController@store')->name('staffs.store');

            Route::get('/detail/{id}', 'StaffController@show')->name('staffs.detail');

            Route::get('/edit/{id}', 'StaffController@edit')->name('staffs.edit');
            Route::post('/edit/{id}', 'StaffController@update')->name('staffs.update');

            Route::post('/delete', 'StaffController@destroy')->name('staffs.destroy');

            Route::post('/reset', 'ResetPasswordController@multipleReset')->name('staffs.reset');
        });

        Route::group(['prefix' => 'departments'], function () {
           Route::get('/', 'DepartmentController@index')->name('departments.index');

           Route::get('/create','DepartmentController@create')->name('departments.create');
           Route::post('/create','DepartmentController@store')->name('departments.store');

            Route::get('/edit/{id}', 'DepartmentController@edit')->name('departments.edit');
            Route::post('/edit/{id}', 'DepartmentController@update')->name('departments.update');

            Route::post('/delete/{id}', 'DepartmentController@destroy')->name('departments.destroy');

            Route::get('/detail/{id}', 'DepartmentController@show')->name('departments.detail');

//            Route::get('/add-user', 'DepartmentController@showView')->name('departments.showView');
            Route::post('/add-user', 'DepartmentController@insertUser')->name('departments.insertUser');

            Route::get('/autocomplete', 'SearchController@autocomplete') -> name('autocomplete');


        });
    });



});

Route::group(['namespace' => 'Staff'], function () {
    Route::get('/profile', 'StaffController@viewProfile');
});
//});







