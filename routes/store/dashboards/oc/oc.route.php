<?php
$controller = \App\Http\Controllers\Store\Dashboards\Oc\SuppliersReceiptsController::class;
Route::get('supplier-receipts',[$controller,'index']);
Route::get('supplier-receipts/list',[$controller,'listSuppliedStocks']);
Route::post('supplier-receipts/{stock_id}/approve',[$controller,'approve']);
Route::post('supplier-receipts/decline',[$controller,'decline']);


$suppliersController = \App\Http\Controllers\Store\Dashboards\Oc\SuppliersController::class;
Route::get('supplier-issues',[$suppliersController,'index']);
Route::get('supplier-issues/list',[$suppliersController,'listSupplierIssues']);
Route::post('supplier-issues/{stock_id}/accept',[$suppliersController,'acceptIssue']);
