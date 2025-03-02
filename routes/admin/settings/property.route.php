<?php
$controller = \App\Http\Controllers\Admin\Settings\PropertyController::class;
Route::get('/',[$controller,'index']);
Route::post('/',[$controller,'storeProperty']);
Route::get('/list',[$controller,'listProperties']);
Route::delete('/delete/{property}',[$controller,'destroyProperty']);
