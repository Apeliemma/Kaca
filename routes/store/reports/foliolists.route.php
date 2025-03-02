<?php
$controller = \App\Http\Controllers\Store\Reports\FolioListsController::class;
Route::get('/',[$controller,'index']);
