<?php
$controller = \App\Http\Controllers\User\NotificationsController::class;
Route::get('get/{id}',[$controller,'viewNotification']);
Route::post('mark-read',[$controller,'markAllRead']);
Route::get('view-all', [$controller,'viewAll']);
Route::get('list/{type}', [$controller,'listNotifications']);
Route::post('mark/{id}', [$controller,'markedRead']);
Route::get('/', [$controller,'index']);
