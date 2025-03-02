<?php
$controller =\App\Http\Controllers\Mo\Reports\RequisitionsController::class;
Route::get('/',[$controller,'index']);
Route::get('/list',[$controller,'listRequisitions']);
