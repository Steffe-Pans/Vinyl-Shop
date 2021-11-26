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

//Route::get('/', function () {
//    //return view('welcome');
//    return 'The Vinyl Shop';
//});

//Route::get('contact-us', function () {
//    //return 'Contact info';
//    return view('contact');
//});

Route::get('contact', function () {
    $me = ['name' => env('MAIL_FROM_NAME')];
    return view('contact', $me);
});
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');
Route::redirect('home', '/');
Route::view('/', 'home');
Route::get('contact-us', 'ContactUsController@show');
Route::post('contact-us', 'ContactUsController@sendEmail');
Route::get('shop', 'ShopController@index');
Route::get('shop/{id}', 'ShopController@show');

//Route::get('admin/records', function (){
//    return view('admin.records.index');
//});

//Route::get('admin/records', function (){
//    $records = [
//        'Queen - Greatest Hits',
//        'The Rolling Stones - Sticky Fingers',
//        'The Beatles - Abbey Road'
//    ];
//
//    return view('admin.records.index', [
//        'records' => $records
//    ]);
//});

//Route::prefix('admin')->group(function () {
//    Route::redirect('/', '/admin/records');
//    Route::get('records', function (){
//        $records = [
//            'Queen - Greatest Hits',
//            'The Rolling Stones - Sticky Fingers',
//            'The Beatles - Abbey Road'
//        ];
//        return view('admin.records.index', [
//            'records' => $records
//        ]);
//    });
//});
Route::prefix('admin')->group(function () {
    Route::redirect('/', '/admin/records');
    Route::get('records', 'Admin\RecordController@index');
});

Route::prefix('admin')->group(function(){
    Route::redirect('/', 'records');
    Route::get('records', 'Admin\RecordController@index');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    route::redirect('/', 'records');
    Route::resource('genres', 'Admin\GenreController');
    Route::get('records', 'Admin\RecordController@index');
});

Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::redirect('/', '/user/profile');
    Route::get('profile', 'User\ProfileController@edit');
    Route::post('profile', 'User\ProfileController@update');
    Route::get('password', 'User\PasswordController@edit');
    Route::post('password', 'User\PasswordController@update');
});
