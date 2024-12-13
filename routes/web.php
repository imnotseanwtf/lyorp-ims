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
use App\Http\Controllers\CancelController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CertificateImageController;
use App\Http\Controllers\CertificatePdfController;
use App\Http\Controllers\ChangingPasswordOrganizationController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\DoneController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\LogOutController;
use App\Http\Controllers\OngoingActivityController;
use App\Http\Controllers\PdfAnswerController;
use App\Http\Controllers\PdfEvaluationController;
use App\Http\Controllers\ProgressUpdateController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RegisteredParticipantController;
use App\Http\Controllers\ReportAction\AcceptReportController;
use App\Http\Controllers\ReportAction\RejectReportController;
use App\Http\Controllers\ReportAction\SoftDeleteReportController;
use App\Http\Controllers\ReportAction\ViewAcceptReportController;
use App\Http\Controllers\ReportAction\ViewRejectReportController;
use App\Http\Controllers\ResubmitController;
use App\Http\Controllers\UserAction\ActivateController;
use App\Http\Controllers\UserAction\RejectUserController;
use App\Http\Controllers\UserAnsweredQuestion;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserReportController;
use App\Http\Controllers\ViewUserActivityRequestController;
use App\Http\Controllers\ViewUserEvaluationController;
use App\Http\Controllers\ViewUserReportController;
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
        'verify' => true,
        'logout' => false,
    ]
);

Route::middleware(['auth', 'verified', 'check_user_status'])->group(function () {

    Route::get('pdf-answer/{id}', PdfAnswerController::class)->name('answer-pdf');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
            'registered' => RegisteredParticipantController::class,
            'progress' => ProgressUpdateController::class,
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

        Route::put('comment/{activity}', CommentController::class);

        Route::get('ongoing-activity', OngoingActivityController::class)->name('ongoing');

        Route::put('/org-password/{user}', ChangingPasswordOrganizationController::class)->name('org.password');

        Route::put('/information-update', WelcomeInformationController::class)->name('information');

        Route::get('/events', AuditController::class)->name('events');

        Route::put('update-certificate', CertificateImageController::class)->name('updateCertificate');

        Route::resources(
            [
                'users' => UserController::class,
                'admin-report' => AdminReportController::class,
                'announcement' => AnnouncementController::class,
                'view-report' => ViewUserReportController::class,
                'view-evaluation' => ViewUserEvaluationController::class,
                'view-activity-request' => ViewUserActivityRequestController::class,
            ],
            [
                'except' => ['create', 'edit'],
                'parameters' => [
                    'admin-report' => 'report',
                    'view-report' => 'report',
                    'view-evaluation' => 'assign',
                    'view-activity-request' => 'activity'
                ],
            ]
        );


        // ACTIVTY REQUEST ACTION
        Route::put('accept-activity/{activity}', AcceptActivityController::class);
        Route::put('reject-activity/{activity}', RejectActivityController::class);

        // USERS ACTION
        Route::put('activate/{user}', ActivateController::class)->name('activate');
        Route::put('reject/{user}', RejectUserController::class)->name('reject');


        // REPORT ACTION
        Route::put('activate-report/{report}', AcceptReportController::class);
        Route::put('reject-report/{report}', RejectReportController::class);

        Route::put('accept-view/{report}', ViewAcceptReportController::class);
        Route::put('reject-view/{report}', ViewRejectReportController::class);
    });

    Route::middleware('role:organization')->group(function () {

        Route::put('resubmit/{report}', ResubmitController::class)->name('resubmit');

        Route::put('done-activity/{activity}', DoneController::class);
        Route::put('cancel-activity/{activity}', CancelController::class);

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
