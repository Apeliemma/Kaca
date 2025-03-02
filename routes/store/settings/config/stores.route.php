<?php
$controller = \App\Http\Controllers\Store\Settings\Config\StoresController::class;
Route::get('/',[$controller,'index']);
Route::post('/',[$controller,'storeStore']);
Route::get('/list',[$controller,'listStores']);
Route::delete('/delete/{store}',[$controller,'destroyStore']);
