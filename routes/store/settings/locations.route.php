<?php
$controller = \App\Http\Controllers\Store\Settings\LocationsController::class;
Route::post('/',[$controller,'storeLocation']);
Route::get('/list',[$controller,'listLocations']);
Route::delete('/delete/{location}',[$controller,'destroyLocation']);
