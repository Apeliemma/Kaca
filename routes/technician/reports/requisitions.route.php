<?php
$controller =\App\Http\Controllers\Technician\Reports\RequisitionsController::class;
Route::get('/',[$controller,'index']);
Route::get('/list',[$controller,'listRequisitions']);
