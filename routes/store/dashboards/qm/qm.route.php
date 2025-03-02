<?php
$controller =\App\Http\Controllers\Store\Dashboards\Qm\ReceiveRequestsController::class;
Route::get('receive-requests',[$controller,'index']);
Route::post('receive-requests/{stock_id}/receive',[$controller,'receiveStock']);
Route::get('list/receive-requests',[$controller,'listReceivedRequests']);

$techReceipts = \App\Http\Controllers\Store\Dashboards\Qm\TechReceiptsController::class;
Route::get('tech-receipts',[$techReceipts,'index']);
Route::post('tech-receipts/process/{stock_id}',[$techReceipts,'processRequest']);
Route::post('tech-receipts/decline',[$techReceipts,'decline']);
Route::get('list/tech-receipts',[$techReceipts,'listReceipts']);

$pendingRequests = \App\Http\Controllers\Store\Dashboards\Qm\PendingRequestsController::class;
Route::get('pending-requests',[$pendingRequests,'index']);
Route::post('pending-requests',[$pendingRequests,'issueSupplier']);
Route::get('list/pending-requests',[$pendingRequests,'listPendingRequests']);
