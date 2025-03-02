<?php
$controller = \App\Http\Controllers\Technician\IndexController::class;
Route::get('/',[$controller,'index']);
