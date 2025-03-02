<?php
$controller = \App\Http\Controllers\Mo\Dashboard\TechIssuesController::class;
Route::get('/',[$controller,'index']);
Route::get('/list',[$controller,'listIssues']);
Route::post('approve/{requisition_id}',[$controller,'approve'])->whereNumber('requisition_id');
Route::post('decline',[$controller,'decline']);
