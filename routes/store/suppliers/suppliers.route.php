<?php
$controller = \App\Http\Controllers\Store\Suppliers\SuppliersController::class;
Route::get('/',[$controller,'index']);
Route::get('/{supplier_id}',[$controller,'supplier'])->where('supplier_id','[0-9]+');
Route::post('/',[$controller,'storeSupplier']);
Route::get('/list',[$controller,'listSuppliers']);
Route::delete('/delete/{supplier}',[$controller,'destroySupplier']);
