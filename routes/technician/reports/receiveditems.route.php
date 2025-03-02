<?php
$controller = \App\Http\Controllers\Technician\Reports\ReceivedItemsController::class;
Route::get('/',[$controller,'index']);
Route::get('/list',[$controller,'listReceivedItems']);
