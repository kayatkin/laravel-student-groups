<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('groups', GroupController::class);

Route::get('groups/{group}/students/create', [GroupController::class, 'createStudent'])->name('groups.students.create');
Route::post('groups/{group}/students', [GroupController::class, 'storeStudent'])->name('groups.students.store');
Route::get('groups/{group}/students/{student}', [GroupController::class, 'showStudent'])->name('groups.students.show');
