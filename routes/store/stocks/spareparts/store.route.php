<?php

use App\Http\Controllers\Store\Stocks\StorePartsController;

$controller = StorePartsController::class;

Route::get('/', [$controller, 'index']);
Route::get('part/{store_part_id}', [$controller, 'viewPart'])->whereNumber('store_part_id');
Route::post('part/{store_part_id}/change-location', [$controller, 'changeLocation'])->whereNumber('store_part_id');
Route::post('part/{store_part_id}/change-category', [$controller, 'changeCategory'])->whereNumber('store_part_id');
Route::post('part/{store_part_id}', [$controller, 'update'])->whereNumber('store_part_id');
Route::get('list', [$controller, 'listStoreParts']);
