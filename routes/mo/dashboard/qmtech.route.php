<?php
$controller = \App\Http\Controllers\Mo\Dashboard\QmTechController::class;
Route::get('approved',[$controller,'approved']);
Route::get('list/approved',[$controller,'listApproved']);
Route::get('receipt',[$controller,'receipt']);
Route::get('list/receipt',[$controller,'listReceipt']);
