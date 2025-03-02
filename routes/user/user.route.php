<?php
$controller = \App\Http\Controllers\User\UserController::class;
Route::get('profile',[$controller,'profile']);
Route::post('profile',[$controller,'updateInitialUser']);
Route::get('state/{state}',[$controller,'changeUserState']);
Route::put('profile/{id}',[$controller,'updateProfile']);
Route::post('profile-picture',[$controller,'updateProfilePicture']);
Route::post('password',[$controller,'updatePassword']);
