<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('decrypt/{property}',function ($property){
    dd(decryptProperty('dGhVSWRUVVRabUkva2FycjlSaXlwQT09OjpYUjmw9++0V8M2mDufcvur')); //Edwin
    dd(decryptProperty('a2kzU1VUbkw0QUxnb3pjdjN2bWxDUT09OjrR02Y50xv1JpxwRuXoUqFK')); //Edwin
});
Route::redirect('/', 'login');
Route::get('tests/{id?}',[\App\Http\Controllers\TestsController::class,'index']);
Route::get('importCSV',[\App\Http\Controllers\TestsController::class,'testCSVImport']);
//
Route::post('auth/login',[\App\Http\Controllers\Auth\LoginController::class,'login']);
//->middleware(['auth'])->name('dashboard');

Route::redirect('/','login');
require __DIR__.'/auth.php';
Route::group(['middleware'=>['auth','web','verified','member']],function(){
    Route::get('/dashboard', function () {
        return redirect(auth()->user()->role);
    })->name('dashboard');

    $agent = new \Jenssegers\Agent\Agent();

    Route::get('home', [\App\Http\Controllers\HomeController::class,'index']);
    $routes_path = base_path('routes');
    $route_files = File::allFiles(base_path('routes'));
    foreach ($route_files as $file) {
        $path = $file->getPath();

        if ($path != $routes_path) {
            $file_name = $file->getFileName();
            $prefix = str_replace($file_name, '', $path);
            $prefix = str_replace($routes_path, '', $prefix);
            $file_path = $file->getPathName();
            $this->route_path = $file_path;
//            $arr = explode('/', $prefix);
            // if windows if less than version 10
            $agent->is('Windows')  ? $arr = explode('\\', $prefix) : $arr = explode('/', $prefix);
            $len = count($arr);
            $main_file = $arr[$len - 1];
            $arr = array_map('ucwords', $arr);
            $arr = array_filter($arr);
            $ext_route = str_replace('index.route.php', '', $file_name);
            $ext_route = str_replace($main_file, '', $ext_route);
            $ext_route = str_replace('.route.php', '', $ext_route);
            $ext_route = str_replace('web', '', $ext_route);

            // if windows is older than version 10
            if ($agent->is('Windows'))
                $prefix = str_replace('\\', '/', strtolower($prefix . '/'.$ext_route));
            else
                $prefix = strtolower($prefix. '/' . $ext_route);

            $implode = ($agent->is('Windows')) ? implode('/', $arr)  : implode('\\', $arr) ;

//            $implode = implode('\\', $arr) ;
            Route::group(['namespace' => $implode, 'prefix' => $prefix ], function () {
                require $this->route_path;
            });
        }
    }
});
