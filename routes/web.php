<?php

use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\AssignToAnswerController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\EvaluationAnswerController;
use App\Http\Controllers\FileDownloadController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ReviewAnswerController;
use App\Http\Controllers\UserAction\ActivateController;
use App\Http\Controllers\UserAction\RejectUserController;
use App\Http\Controllers\UserAnsweredQuestion;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {

    Route::middleware('role:admin')->group(function () {

        Route::get('answer/{id}', UserAnsweredQuestion::class)->name('answer');

        // RESOURCES
        Route::resources(
            [
                'criteria' => CriteriaController::class,
                'question' => QuestionController::class,
                'users' => UserController::class,
                'review' => ReviewAnswerController::class,
                'admin-report' => AdminReportController::class,
            ],
            [
                'except' => ['create', 'edit'],
                'parameters' => [
                    'criteria' => 'criteria',
                ]
            ]
        );

        Route::put('activate/{user}', ActivateController::class)->name('activate');
        Route::put('reject/{user}', RejectUserController::class)->name('reject');
    });



    Route::middleware('role:organization')->group(function () {
        Route::resources(
            [
                'evaluation' => EvaluationAnswerController::class,
                'user-report' => UserReportController::class,
            ]
        );
    });



    Route::view('about', 'about')->name('about');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
