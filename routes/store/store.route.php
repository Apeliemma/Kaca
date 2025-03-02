<?php
$controller =\App\Http\Controllers\Store\IndexController::class;
Route::get('/',[$controller,'index']);
