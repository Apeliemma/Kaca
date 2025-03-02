<?php
$controller = \App\Http\Controllers\Store\Stocks\MovementsController::class;
Route::get('/',[$controller,'index']);
Route::get('/list',[$controller,'listStocksMovement']);
