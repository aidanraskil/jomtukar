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

	$profiles = App\Profile::where('id', '!=', Auth::id())->latest()->take(6)->get();

    return view('welcome', compact('profiles'));
})->name('welcome');

Auth::routes();

Route::group(['prefix' => 'mesej'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});

Route::get('/utama', 'HomeController@index')->name('home');
Route::get('/tetapan/profil', 'SettingController@getProfile')->name('profile.edit');
Route::put('/tetapan/profil', 'SettingController@postProfile')->name('profile.update');

Route::post('/tetapan/gambar', 'SettingController@postPicture')->name('picture');

Route::get('/tetapan/akaun', 'SettingController@getAccount')->name('account.edit');
Route::put('/tetapan/akaun', 'SettingController@postAccount')->name('account.update');
Route::delete('/tetapan/akaun', 'SettingController@destroy')->name('account.destroy');

Route::get('/tetapan/profil/tambah', 'ProfileController@create')->name('profile.create');
Route::get('/tetapan/profil/kemaskini', 'ProfileController@edit')->name('profile.kemaskini');
Route::put('/tetapan/profil_tukar', 'SettingController@update')->name('profile.simpan');
Route::post('/profil', 'ProfileController@store')->name('profile.store');

Route::get('/pertukaran', 'ProfileController@index')->name('profile.index');
Route::get('/{id}', 'ProfileController@show')->name('profile.show');

Route::resource('/babi', 'BabiController');





