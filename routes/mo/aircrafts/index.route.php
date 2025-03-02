<?php
$controller = \App\Http\Controllers\Mo\Aircrafts\IndexController::class;
Route::get('/',[$controller,'index']);
Route::post('/',[$controller,'storeAircraft']);
Route::get('/list',[$controller,'listAircraft']);
Route::delete('/delete/{aircraft}',[$controller,'destroyAircraft']);
