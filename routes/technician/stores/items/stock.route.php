<?php
$controller = \App\Http\Controllers\Technician\Stores\Items\StockController::class;
Route::get('{stock_id}',[$controller,'index'])->whereNumber('stock_id');
