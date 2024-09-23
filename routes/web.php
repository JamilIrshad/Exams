<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;

use Illuminate\Support\Facades\Route;

//Routes which do not require any middleware
// Login Page Route
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Login authentication Route
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
// Signup Route
Route::get('/signup', [SignUpController::class, 'showSignUpForm'])->name('signup');
Route::post('/signup', [SignUpController::class, 'register'])->name('register');


//routes group with auth and admin middleware
Route::middleware(['auth', 'admin'])->group(function () {

    //Route for displaying categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.list');
    //Route for creating new categories
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    //Route for storing new categories
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    //route for editing categories
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    //route for updating categories
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    //Route for deleting categories
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    //Route for creating new exams
    Route::get('/exams/create', [ExamController::class, 'create'])->name('exams.create');
    //Route for storing new exams
    Route::post('/exams', [ExamController::class, 'store'])->name('exams.store');
    //Route for editing exams
    Route::get('/exams/{exam}/edit', [ExamController::class, 'edit'])->name('exams.edit');
    //Route for updating exams
    Route::put('/exams/{exam}', [ExamController::class, 'update'])->name('exams.update');
    //Route for deleting exams
    Route::delete('/exams/{exam}', [ExamController::class, 'destroy'])->name('exams.destroy');

    //Route for displaying all questions
    Route::get('/questions', [QuestionController::class, 'index'])->name('questions.list');
    //Route for creating new question
    Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
    //Route for storing new exams
    Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');

    //get route for displaying pdf.question
    Route::get('/questions/pdf/{exam}', [QuestionController::class, 'showpdf'])->name('questions.showPDF');
});

//Routes which require only auth middleware
Route::middleware(['auth'])->group(function () {
    //Route for displaying home page
    Route::get('/', [ExamController::class, 'index']);


    //Route for displaying exams
    Route::get('/exams', [ExamController::class, 'index'])->name('exams.list');

    //route for displaying questions according to exam id using question controller
    Route::post('/questions/show/{exam}', [QuestionController::class, 'show'])->name('examquestion.list');
    
    //post route of question controller for downloadPDF($id)
    Route::post('/questions/downloadPDF/{exam}', [QuestionController::class, 'downloadPDF'])->name('questions.downloadPDF');

    //search post route
    Route::post('/search', [ExamController::class, 'search'])->name('search');

    Route::get('/purchased', [ExamController::class, 'purchasedExams'])->name('purchased.exams');

    //post route order controller store
    Route::post('/order/{exam}', [OrderController::class, 'store'])->name('order.store');


    Route::get('/payment/success', [PaymentController::class, 'store'])->name('payment.store');

    //payment declined route
    Route::post('/payment/declined', [PaymentController::class, 'declined'])->name('payment.declined');

    //route for displaying payment view
    Route::get('/payment/{order}', [PaymentController::class, 'create'])->name('payment.create');

    //route for declined payment
    Route::post('/decline', [PaymentController::class, 'declined'])->name('payment.declined');
    
    //logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

});



