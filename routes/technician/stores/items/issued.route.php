<?php
$controller = \App\Http\Controllers\Technician\Stores\Items\IssuedController::class;
Route::get('/',[$controller, 'index']);
Route::get('/list',[$controller, 'listIssuedItems']);
