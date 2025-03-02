<?php
$controller = \App\Http\Controllers\Store\Reports\Forms\FF7107Controller::class;
Route::get('/',[$controller,'index']);
Route::get('/{storePartId}/stocksheet',[$controller,'stocksheet'])->whereNumber('storePartId');
