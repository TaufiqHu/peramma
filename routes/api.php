<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('students', 'StudentController@nis')->name('api.students.prefix');
Route::get('students/{student:nis}', 'StudentController@nis')->name('api.students.nis');

Route::get('books', 'BookController@isbn')->name('api.books.prefix');
Route::get('books/{book:isbn}', 'BookController@isbn')->name('api.books.isbn');

// Route::post('students/get', 'StudentController@getAPI')->name('api.students.get');
// Route::post('books/get', 'BookController@getAPI')->name('api.books.get');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
