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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('procedimentos','ProcedimentoController');
Route::get('procedimentos/{procedimento}/destroy','ProcedimentoController@destroy')->name('procedimentos.destroy');


Route::resource('exames','ExameController');
Route::get('exames/{exame}/destroy','ExameController@destroy')->name('exames.destroy');     //Utiliza método Get em vez de DELETE, 
                               
                                                                            //permite utilizar botão como link sem precisa de forms
Auth::routes();


Route::get('admin_login', 'AdminAuth\LoginController@showLoginForm');
Route::post('admin_login', 'AdminAuth\LoginController@login')->name('admin_login.login');
Route::post('admin_logout', 'AdminAuth\LoginController@logout');
Route::post('admin_password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
Route::get('admin_password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
Route::post('admin_password/reset', 'AdminAuth\ResetPasswordController@reset');
Route::get('admin_password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

Route::post('admin_register ', 'AdminAuth\RegisterController@register')->name('admin_login.register');
Route::get('admin_register', 'AdminAuth\RegisterController@showRegistrationForm');



Route::get('/home', 'HomeController@index');
Route::get('/admin_home', 'AdminHomeController@index');
