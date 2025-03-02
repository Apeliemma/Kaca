<?php
$controller = \App\Http\Controllers\Technician\Stores\Items\TloansController::class;
Route::get('/',[$controller,'index']);
Route::get('/list',[$controller,'listTloans']);
