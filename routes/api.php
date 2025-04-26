<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DevelopmentController;
use App\Http\Controllers\FamilyMemberController;
use App\Http\Controllers\HeadOfFamilyController;
use App\Http\Controllers\EventParticipantController;
use App\Http\Controllers\SocialAssistanceController;
use App\Http\Controllers\DevelopmentApplicantController;
use App\Http\Controllers\SocialAssistanceRecipientController;

Route::apiResource('user', UserController::class);
Route::get('user/all/paginated',[UserController::class, 'getAllPaginated']);

Route::apiResource('head-of-family', HeadOfFamilyController::class);
Route::get('head-of-family/all/paginated',[HeadOfFamilyController::class, 'getAllPaginated']);

Route::apiResource('family-member', FamilyMemberController::class);
Route::get('family-member/all/paginated',[FamilyMemberController::class, 'getAllPaginated']);

Route::apiResource('social-assistance', SocialAssistanceController::class);
Route::get('social-assistance/all/paginated',[SocialAssistanceController::class, 'getAllPaginated']);

Route::apiResource('social-assistance-recipient', SocialAssistanceRecipientController::class);
Route::get('social-assistance-recipient/all/paginated',[SocialAssistanceRecipientController::class, 'getAllPaginated']);

Route::apiResource('event', EventController::class);
Route::get('event/all/paginated',[EventController::class, 'getAllPaginated']);

Route::apiResource('event-participant', EventParticipantController::class);
Route::get('event-participant/all/paginated',[EventParticipantController::class, 'getAllPaginated']);

Route::apiResource('development', DevelopmentController::class);
Route::get('development/all/paginated',[DevelopmentController::class, 'getAllPaginated']);

Route::apiResource('development-applicant', DevelopmentApplicantController::class);
Route::get('development-applicant/all/paginated',[DevelopmentApplicantController::class, 'getAllPaginated']);

Route::get('profile', [ProfileController::class, 'index']);
Route::post('profile', [ProfileController::class, 'store']);
Route::put('profile', [ProfileController::class, 'update']);
