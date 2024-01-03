<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeachersController;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/' , function(){
    return redirect()->route('actions');
});

Route::get('/students',[StudentsController::class,"nonArgsIndex"])->name('actions');

Route::get('/edit/{type}/{id}',[StudentsController::class, 'edit'])->name('users.edit');
Route::post('/edit/{type}/{id}', [StudentsController::class, 'editUser'])->name('users.makeEdit');

Route::get('/students/{class_id}/{group_id}', [StudentsController::class,'index'])->name('students.list');


Route::delete('/students/{id}/{class_id}/{group_id}/',StudentsController::class .'@destroy')->name('students.destroy');



Route::get('/teachers', [TeachersController::class,"index"])->name('teachers');
