<?php
$controller = \App\Http\Controllers\Admin\Logs\LogsController::class;
Route::get('/',[$controller,'index']);
Route::post('/',[$controller,'storeLog']);
Route::get('/list',[$controller,'listLogs']);
Route::delete('/delete/{log}',[$controller,'destroyLog']);
