<?php
$controller = \App\Http\Controllers\Admin\Users\UsersController::class;
Route::get('/',[$controller,'index']);
Route::get('/list/{role?}',[$controller,'listUsers']);
