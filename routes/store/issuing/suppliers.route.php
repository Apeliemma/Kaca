<?php
$controller= \App\Http\Controllers\Store\Issuing\SuppliersController::class;
Route::get('/',[$controller,'index']);
Route::get('/list',[$controller,'listIssuesToSupplier']);
