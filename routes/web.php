<?php

use App\Http\Controllers\ActivityRequestAction\AcceptActivityController;
use App\Http\Controllers\ActivityRequestAction\RejectActivityController;
use App\Http\Controllers\ActivityRequestController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AnsweredController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\AssignToAnswerController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CertificateImageController;
use App\Http\Controllers\CertificatePdfController;
use App\Http\Controllers\ChangingPasswordOrganizationController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\LogOutController;
use App\Http\Controllers\PdfEvaluationController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ReportAction\SoftDeleteReportController;
use App\Http\Controllers\UserAction\ActivateController;
use App\Http\Controllers\UserAction\RejectUserController;
use App\Http\Controllers\UserAnsweredQuestion;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserReportController;
use App\Http\Controllers\WelcomeInformationController;
use App\Models\WelcomeInformation;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $welcome = WelcomeInformation::find(1);

    return view('welcome', compact('welcome'));
})->name('welcome');

Route::get('/faqs', function () {
    $welcome = WelcomeInformation::find(1);

    return view('faq', compact('welcome'));
})->name('faq');

Auth::routes(
    [
        'logout' => false
    ]
);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {

    Route::get('evaluation-pdf', PdfEvaluationController::class)->name('pdf.evaluation');

    Route::post('/logout', LogOutController::class)->name('logout');

    Route::get('archive', [ArchiveController::class, 'index'])->name('archive.index');
    Route::get('archive/{report}', [ArchiveController::class, 'show'])->name('archive.show');
    Route::get('answered/{id}', AnsweredController::class)->name('answered');
    Route::get('certificate-pdf/{certificate}', CertificatePdfController::class)->name('pdf');

    Route::resources(
        [
            'folder' => FolderController::class,
            'activity-request' => ActivityRequestController::class,
            'certificate' => CertificateController::class,
            'assign-answer' => AssignToAnswerController::class,
            'evaluation' => AnswerController::class,
            'criteria' => CriteriaController::class,
            'question' => QuestionController::class,
        ],
        [
            'except' => ['create', 'edit'],
            'parameters' => [
                'activity-request' => 'activity',
                'assign-answer' => 'assign',
                'criteria' => 'criteria',
            ]
        ]
    );


    Route::middleware('role:admin')->group(function () {

        Route::put('/org-password/{user}', ChangingPasswordOrganizationController::class)->name('org.password');

        Route::put('/information-update', WelcomeInformationController::class)->name('information');

        Route::get('/events', AuditController::class)->name('events');

        Route::put('update-certificate', CertificateImageController::class)->name('updateCertificate');

        // RESOURCES
        Route::resources(
            [
                'users' => UserController::class,
                'admin-report' => AdminReportController::class,
                'announcement' => AnnouncementController::class,
            ],
            [
                'except' => ['create', 'edit'],
                'parameters' => [
                    'admin-report' => 'report',
                ]
            ]
        );
        // ACTIVTY REQUEST ACTION
        Route::put('accept-activity/{activity}', AcceptActivityController::class);
        Route::put('reject-activity/{activity}', RejectActivityController::class);

        // USERS ACTION
        Route::put('activate/{user}', ActivateController::class)->name('activate');
        Route::put('reject/{user}', RejectUserController::class)->name('reject');
    });



    Route::middleware('role:organization')->group(function () {
        Route::put('soft-delete/{report}', SoftDeleteReportController::class);

        Route::resources(
            [
                'user-report' => UserReportController::class,
            ],
            [
                'except' => ['create', 'edit'],
                'parameters' => [
                    'user-report' => 'report',
                ]
            ]
        );
    });



    Route::view('about', 'about')->name('about');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
