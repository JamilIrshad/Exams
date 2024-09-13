<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignUpController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route for displaying categories
Route::get('/categories',[CategoryController::class,'index'])->name('categories.list')->middleware('auth','admin');
//Route for creating new categories
Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create')->middleware('auth','admin');
//Route for storing new categories
Route::post('/categories',[CategoryController::class,'store'])->name('categories.store')->middleware('auth','admin');
//route for editing categories
Route::get('/categories/{category}/edit',[CategoryController::class,'edit'])->name('categories.edit')->middleware('auth','admin');
//route for updating categories
Route::put('/categories/{category}',[CategoryController::class,'update'])->name('categories.update')->middleware('auth','admin');
//Route for deleting categories
Route::delete('/categories/{category}',[CategoryController::class,'destroy'])->name('categories.destroy')->middleware('auth','admin');

//Route for displaying exams
Route::get('/exams',[ExamController::class,'index'])->name('exams.list')->middleware('auth');
//Route for creating new exams
Route::get('/exams/create',[ExamController::class,'create'])->name('exams.create')->middleware('auth','admin');
//Route for storing new exams
Route::post('/exams',[ExamController::class,'store'])->name('exams.store')->middleware('auth','admin');
//Route for editing exams
Route::get('/exams/{exam}/edit',[ExamController::class,'edit'])->name('exams.edit')->middleware('auth','admin');
//Route for updating exams
Route::put('/exams/{exam}',[ExamController::class,'update'])->name('exams.update')->middleware('auth','admin');
//Route for deleting exams
Route::delete('/exams/{exam}',[ExamController::class,'destroy'])->name('exams.destroy')->middleware('auth','admin');

//Login Page Route
Route::get('/login',[LoginController::class,'showLoginForm'])->name('login');

//Login authentication Route
Route::post('/login',[LoginController::class,'authenticate'])->name('authenticate');

//logout
Route::post('/logout',[LoginController::class,'logout'])->name('logout')->middleware('auth');



//Signup Route
Route::get('/signup',[SignUpController::class,'showSignUpForm'])->name('signup');
Route::post('/signup',[SignUpController::class,'register'])->name('register');

