<?php
$controller = \App\Http\Controllers\Mo\Stocks\StockController::class;
Route::get('/{stock_id}',[$controller,'index'])->whereNumber('stock_id');
