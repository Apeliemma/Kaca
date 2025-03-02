<?php
$controller = \App\Http\Controllers\Store\Settings\DepartmentsController::class;
Route::post('/',[$controller,'storeDepartment']);
Route::get('/list',[$controller,'listDepartments']);
Route::delete('/delete/{department}',[$controller,'destroyDepartment']);
