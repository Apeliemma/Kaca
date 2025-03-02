<?php
$controller = \App\Http\Controllers\Store\Stocks\StockController::class;
Route::get('{stock_id}',[$controller,'viewStock'])->whereNumber('stock_id');
Route::post('approve/{spare_part_id}',[$controller,'approve'])->whereNumber('spare_part_id');
Route::post('decline',[$controller,'decline']);
Route::post('return/{store_part_id}',[$controller,'returnToSupplier'])->whereNumber('store_part_id');
