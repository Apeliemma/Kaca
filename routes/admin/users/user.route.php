<?php
$controller = \App\Http\Controllers\Admin\Users\UserController::class;
Route::get('/{id}',[$controller,'index'])->where('id','[0-9]+');
Route::post('/',[$controller,'createUser']);
Route::post('/store',[$controller,'storeUser']);
Route::post('activate/{id}',[$controller,'activate']);
Route::post('reset-password/{id}',[$controller,'resetPassword']);
Route::post('login/{id}',[$controller,'login']);
Route::post('deactivate/{id}',[$controller,'deactivate']);
Route::post('{user_id}/verify-email',[$controller,'verifyEmail']);
Route::delete('/delete/{user_id}',[$controller,'destroyUser']);

