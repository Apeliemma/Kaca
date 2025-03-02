<?php
$controller = \App\Http\Controllers\Store\Stocks\StocksController::class;
Route::get('list/{status}',[$controller,'listStocks']);
