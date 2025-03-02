<?php
$receiptController = \App\Http\Controllers\Store\Dashboards\Oc\TechReceiptController::class;
Route::get('receipts',[$receiptController,'index']);
Route::get('receipts/list',[$receiptController,'listReceipts']);
Route::post('receipts/approve/{stock_id}',[$receiptController,'approve'])->whereNumber('stock_id');
Route::post('receipts/decline',[$receiptController,'decline']);
