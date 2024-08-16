<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\OnlineController;
use App\Http\Controllers\AcceptFormController ;
use App\Http\Controllers\CertificateController ;
use App\Http\Controllers\ColorStatusController;
use App\Http\Controllers\ContentTypeController;
use App\Http\Controllers\CourseGroupController;
use App\Http\Controllers\SocialUseController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/meeting-form', function () {
    return view('home.meeting');
});



// Create a new meeting record
Route::post('/meeting', [MeetingController::class, 'create']);


// Update a meeting record by ID
Route::put('/meeting/{id}', [MeetingController::class, 'update']);

// Get a meeting record by ID
Route::get('/meeting/{id}', [MeetingController::class, 'show']);

// Get all meeting records
Route::get('/meetings', [MeetingController::class, 'index']);

// Delete a meeting record by ID
Route::delete('/meeting/{id}', [MeetingController::class, 'destroy']);

Route::post('/online', [OnlineController::class, 'create']);

// Update an online record by ID
Route::put('/online/{id}', [OnlineController::class, 'update']);

// Get an online record by ID
Route::get('/online/{id}', [OnlineController::class, 'show']);

// Get all online records
Route::get('/onlines', [OnlineController::class, 'index']);

// Delete an online record by ID
Route::delete('/online/{id}', [OnlineController::class, 'destroy']);

// Create a new acceptFrom record
Route::post('/acceptFrom', [AcceptFormController::class, 'create']);

// Update an acceptFrom record by ID
Route::put('/acceptFrom/{id}', [AcceptFormController::class, 'update']);

// Get an acceptFrom record by ID
Route::get('/acceptFrom/{id}', [AcceptFormController::class, 'show']);

// Get all acceptFrom records
Route::get('/acceptFroms', [AcceptFormController::class, 'index']);

// Delete an acceptFrom record by ID
Route::delete('/acceptFrom/{id}', [AcceptFormController::class, 'destroy']);


// Create a new certificate record
Route::post('/certificates', [CertificateController::class, 'create']);

// Update a certificate record by ID
Route::put('/certificates/{id}', [CertificateController::class, 'update']);

// Get a certificate record by ID
Route::get('/certificates/{id}', [CertificateController::class, 'show']);

// Get all certificate records
Route::get('/certificates', [CertificateController::class, 'index']);

// Delete a certificate record by ID
Route::delete('/certificates/{id}', [CertificateController::class, 'destroy']);

// Create a new color status record
Route::post('/colorStatus', [ColorStatusController::class, 'create']);

// Update a color status record by ID
Route::put('/colorStatus/{id}', [ColorStatusController::class, 'update']);

// Get a color status record by ID
Route::get('/colorStatus/{id}', [ColorStatusController::class, 'show']);

// Get all color status records
Route::get('/colorStatuses', [ColorStatusController::class, 'index']);

// Delete a color status record by ID
Route::delete('/colorStatus/{id}', [ColorStatusController::class, 'destroy']);

// Create a new content type record
Route::post('/contentType', [ContentTypeController::class, 'create']);

// Update a content type record by ID
Route::put('/contentType/{id}', [ContentTypeController::class, 'update']);

// Get a content type record by ID
Route::get('/contentType/{id}', [ContentTypeController::class, 'show']);

// Get all content type records
Route::get('/contentTypes', [ContentTypeController::class, 'index']);

// Delete a content type record by ID
Route::delete('/contentType/{id}', [ContentTypeController::class, 'destroy']);

// Create a new course group record
Route::post('/courseGroup', [CourseGroupController::class, 'create']);

// Update a course group record by ID
Route::put('/courseGroup/{id}', [CourseGroupController::class, 'update']);

// Get a course group record by ID
Route::get('/courseGroup/{id}', [CourseGroupController::class, 'show']);

// Get all course group records
Route::get('/courseGroups', [CourseGroupController::class, 'index']);

// Delete a course group record by ID
Route::delete('/courseGroup/{id}', [CourseGroupController::class, 'destroy']);

// Create a new social use record
Route::post('/socialUse', [SocialUseController::class, 'create']);

// Update a social use record by ID
Route::put('/socialUse/{id}', [SocialUseController::class, 'update']);

// Get a social use record by ID
Route::get('/socialUse/{id}', [SocialUseController::class, 'show']);

// Get all social use records
Route::get('/socialUses', [SocialUseController::class, 'index']);

// Delete a social use record by ID
Route::delete('/socialUse/{id}', [SocialUseController::class, 'destroy']);

