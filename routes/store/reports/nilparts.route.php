<?php
$controller = \App\Http\Controllers\Store\Reports\NilPartsController::class;
Route::get('/',[$controller,'index']);
Route::get('/list',[$controller,'listSpareParts']);
