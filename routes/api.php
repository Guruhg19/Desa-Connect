<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\EventParticipantController;
use App\Http\Controllers\FamilyMemberController;
use App\Http\Controllers\HeadOfFamilyController;
use App\Http\Controllers\SocialAssistanceController;
use App\Http\Controllers\SocialAssistanceRecipientController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
