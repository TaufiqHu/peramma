<?php

use App\Http\Controllers\SettingController;
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

Route::get(
    '/barcode',
    function () {
        return view('barcode');
    }
);

Auth::routes();


Route::get('/home', function () {
    return redirect()->to(route('admin.dashboard'));
})->name('home');

Route::get('/admin', 'DashboardController@index')->name('admin.dashboard');

Route::middleware(['auth'])->group(function () {

    // Data Siswa/Anggota
    Route::get('/data/students', 'StudentController@index')->name('student-index');
    Route::get('/data/students/{student}/edit', 'StudentController@edit')->name('student-edit');
    Route::get('/data/students/{student}', 'StudentController@show')->name('student-show');
    Route::post('/data/students', 'StudentController@store')->name('student-store');
    Route::put('/data/students/{student}', 'StudentController@update')->name('student-update');
    Route::delete('/data/students/{student}', 'StudentController@destroy')->name('student-destroy');

    Route::resource('data/booktypes', BookTypeController::class);
    Route::resource('data/bookcases', BookcaseController::class);
    Route::resource('data/classrooms', ClassRoomController::class);
    Route::resource('data/books', BookController::class);

    Route::get('event/borrow/new', 'LendController@create')->name('lends.create');
    Route::post('event/borrow', 'LendController@store')->name('lends.store');
    Route::get('event/borrow', 'LendController@index')->name('lends.index');
    Route::get('event/borrow/{lend}', 'LendController@show')->name('lends.show');

    Route::get('/setting', 'SettingController@index')->name('setting.index');
    Route::put('/setting', 'SettingController@update')->name('setting.update');
});
