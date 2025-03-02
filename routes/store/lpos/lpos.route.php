<?php
$controller = \App\Http\Controllers\Store\Lpos\IndexController::class;
$lpoController = \App\Http\Controllers\Store\Lpos\LposController::class;

Route::get('/',[$controller,'index']);
Route::get('/list/{condition}',[$controller,'listSparePartsLpos']);

// LPO Controller
Route::get('/list',[$lpoController,'listLpos']);
Route::post('/',[$lpoController,'storeLpo']);
