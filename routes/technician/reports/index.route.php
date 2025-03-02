<?php
$controller = \App\Http\Controllers\Technician\Reports\IndexController::class;
Route::get('/',[$controller,'index']);
