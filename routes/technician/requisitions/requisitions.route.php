<?php
$controller = \App\Http\Controllers\Technician\Requisitions\IndexController::class;
Route::get('/',[$controller,'index']);
Route::post('/{spare_part_id}',[$controller,'createRequisition']);
Route::get('list/{spare_part_id?}',[$controller,'listPartRequisition']);
