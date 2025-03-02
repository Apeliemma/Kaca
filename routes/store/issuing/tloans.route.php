<?php
$controller = \App\Http\Controllers\Store\Issuing\IndexController::class;
$loanController =\App\Http\Controllers\Store\Issuing\TloansController::class;

Route::get('/',[$loanController,'index']);
Route::post('/',[$controller,'loanItem']);
Route::post('return/{stockID}',[$loanController,'returnItem']);
Route::get('/list',[$loanController,'listTloans']);
