<?php
$controller = \App\Http\Controllers\Store\Receiving\Tech\IndexController::class;
Route::get('/',[$controller,'index']);
Route::get('list/{status}',[$controller,'listIssuedStocks']);
Route::post('/receive/{stockID}',[$controller,'receive']);

