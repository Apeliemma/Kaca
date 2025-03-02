<?php
$controller = \App\Http\Controllers\Store\Receiving\Suppliers\IndexController::class;
Route::get('/',[$controller,'index']);
Route::post('/',[$controller,'receiveParts']);
Route::get('/list-parts',[$controller,'listSpareParts']);
