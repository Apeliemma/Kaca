<?php
$controller = \App\Http\Controllers\Store\Issuing\RequestsController::class;
Route::get('/',[$controller,'index']);
Route::get('/issued',[$controller,'issued']);
Route::post('/approve/{stockID}',[$controller,'approve']);
Route::post('/issue',[$controller,'issue']);
Route::get('/list/{status}',[$controller,'listRequestedStocks']);
