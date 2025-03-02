<?php
$controller = \App\Http\Controllers\Technician\Stores\ItemsController::class;
Route::get('/',[$controller,'index']);
Route::get('/list',[$controller,'listSpareParts']);
Route::get('/make-requisition',[$controller,'makeRequisition']);
Route::get('{id}/printff890',[$controller,'showForcesForm890']);
Route::get('/{store_part_id}',[$controller,'viewPart'])->where('store_part_id','[0-9]+');
Route::post('/issue',[$controller,'issue']);
