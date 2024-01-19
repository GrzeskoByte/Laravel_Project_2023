<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\AuthController;

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

Route::get('/',[StudentsController::class,'nonArgsIndex'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/students',[StudentsController::class,"nonArgsIndex"])->name('actions');

    Route::get('/edit/{type}/{id}',[StudentsController::class, 'edit'])->name('users.edit');
    Route::post('/edit/{type}/{id}', [StudentsController::class, 'editUser'])->name('users.makeEdit');

    Route::get('/students/{class_id}/{group_id}', [StudentsController::class,'index'])->name('students.list');
    Route::delete('/students/{id}/{class_id}/{group_id}/',StudentsController::class .'@destroy')->name('students.destroy');

    Route::get('/create/{type}/form',[StudentsController::class,'create'])->name('users.create');
    Route::post('/create/{type}/form',[StudentsController::class,'makeCreation'])->name('users.makeCreation');


    Route::get('/teachers', [TeachersController::class,"index"])->name('teachers');
    Route::get('/teachers/{id}/details', [TeachersController::class,'details'])->name('teacher.details');

    Route::get('/class/assign/',[TeachersController::class, 'assignClass'])->name('assign.class');
    Route::post('/class/assign/',[TeachersController::class, 'makeClassAssigement'])->name('assign.makeClass');

    Route::get('/class/create/',[TeachersController::class, 'createClass'])->name('create.class');
    Route::post('/class/create/',[TeachersController::class, 'makeClassCreation'])->name('create.makeClass');


    Route::get('/group/create/',[TeachersController::class,'createGroup'])->name('create.group');
    Route::post('/group/create/',[TeachersController::class,'makeGroupCreation'])->name('create.makeGroupCreation');

});

require __DIR__.'/auth.php';
