<?php
$controller = \App\Http\Controllers\Admin\Settings\LogTypesController::class;
Route::get('/',[$controller,'index']);
Route::post('/',[$controller,'storeLogType']);
Route::get('/list',[$controller,'listLogTypes']);
Route::delete('/delete/{logtype}',[$controller,'destroyLogType']);
