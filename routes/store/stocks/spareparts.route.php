<?php
$controller = \App\Http\Controllers\Store\Stocks\SparePartsController::class;
Route::get('/', [$controller, 'index'])->name('spareparts.index');
Route::get('/create', [$controller, 'create']);
Route::get('/{spare_part_id}/edit', [$controller, 'editSparePart'])->whereNumber('spare_part_id');
Route::get('/{spare_part_id}', [$controller, 'viewPart'])->whereNumber('spare_part_id');
Route::post('/', [$controller, 'storeSparePart']);
Route::get('/list', [$controller, 'listSpareParts']);
Route::delete('/delete/{sparepart}', [$controller, 'destroySparePart']);
Route::put('/{spare_part_id}', [$controller, 'updateSparePart'])->whereNumber('spare_part_id');