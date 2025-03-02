<?php
$controller = \App\Http\Controllers\Admin\Settings\PropertyModelController::class;
Route::get('/{property_id}',[$controller,'index'])->where('property_id','[0-9]+');
Route::post('/',[$controller,'storePropertyModel']);
Route::get('/list',[$controller,'listPropertyModels']);
Route::delete('/delete/{propertymodel}',[$controller,'destroyPropertyModel']);
