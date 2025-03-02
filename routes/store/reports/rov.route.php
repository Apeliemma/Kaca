<?php
$controller = \App\Http\Controllers\Store\Reports\RovController::class;
Route::get('/',[$controller,'index']);
Route::get('/print',[$controller,'printRov']);
Route::get('/list',[$controller,'listRecordOfVouchers']);
Route::post('/assign-technician',[$controller,'assignTechnician']);

