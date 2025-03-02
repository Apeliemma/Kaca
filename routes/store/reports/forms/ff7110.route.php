<?php
$controller = \App\Http\Controllers\Store\Reports\Forms\FF7110Controller::class;
Route::get('/{rov_id}',[$controller,'index']);
