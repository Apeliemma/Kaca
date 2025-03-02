<?php
$controller = \App\Http\Controllers\Store\Settings\CategoriesController::class;
Route::get('/',[$controller,'index']);
Route::post('/',[$controller,'storeCategory']);
Route::get('/list',[$controller,'listCategories']);
Route::delete('/delete/{category}',[$controller,'destroyCategory']);
