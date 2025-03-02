<?php
$controller = \App\Http\Controllers\Technician\Dashboard\IndexController::class;
Route::get('list/qm-requests/{status}',[$controller,'listRequestsByStatus']);
