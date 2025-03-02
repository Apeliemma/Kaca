<?php
$controller = \App\Http\Controllers\Store\Lpos\LpoController::class;
Route::get('/{lpo_id}',[$controller,'index']);
Route::get('list/{lpo_id}',[$controller,'listStocks']);
