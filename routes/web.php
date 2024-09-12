<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExamController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route for displaying categories
Route::get('/categories',[CategoryController::class,'index'])->name('categories.list');
//Route for creating new categories
Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
//Route for storing new categories
Route::post('/categories',[CategoryController::class,'store'])->name('categories.store');
//route for editing categories
Route::get('/categories/{category}/edit',[CategoryController::class,'edit'])->name('categories.edit');
//route for updating categories
Route::put('/categories/{category}',[CategoryController::class,'update'])->name('categories.update');
//Route for deleting exams
Route::delete('/categories/{category}',[CategoryController::class,'destroy'])->name('categories.destroy');

//Route for displaying exams
Route::get('/exams',[ExamController::class,'index'])->name('exams.list');
//Route for creating new exams
Route::get('/exams/create',[ExamController::class,'create'])->name('exams.create');
//Route for storing new exams
Route::post('/exams',[ExamController::class,'store'])->name('exams.store');
//Route for editing exams
Route::get('/exams/{exam}/edit',[ExamController::class,'edit'])->name('exams.edit');
//Route for updating exams
Route::post('/exams/{exam}',[ExamController::class,'update'])->name('exams.update');
//Route for deleting exams
Route::delete('/exams/{exam}',[ExamController::class,'destroy'])->name('exams.destroy');
