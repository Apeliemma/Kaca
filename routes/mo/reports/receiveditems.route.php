<?php
$controller = \App\Http\Controllers\Mo\Reports\ReceivedItemsController::class;
Route::get('/',[$controller,'index']);
Route::get('/list',[$controller,'listReceivedItems']);
