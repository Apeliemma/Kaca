<?php
$controller = \App\Http\Controllers\Mo\Requisitions\IndexController::class;
$requsitionController = \App\Http\Controllers\Mo\Requisitions\RequisitionController::class;
Route::get('/',[$controller,'index']);
Route::get('/list/{status}',[$controller,'listPartsRequisition']);


Route::get('/{requisition_id}',[$requsitionController,'index'])->whereNumber('requisition_id');
Route::post('approve/{requisition_id}',[$requsitionController,'approve'])->whereNumber('requisition_id');
Route::post('decline',[$requsitionController,'decline']);

