<?php

use Illuminate\Routing\Router;
use Illuminate\Routing\RouteRegistrar;
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

/** @var Router|RouteRegistrar $router */
$router = resolve(Router::class);

$router->middleware('guest')->group(static function(Router|RouteRegistrar $router) {
    $router->redirect('/', '/login');
    $router->get('login', [\App\Http\Controllers\AuthController::class, 'showLogin'])->name('auth.login');
});

$router->middleware('auth')->group(static function(Router|RouteRegistrar $router) {
    //
});
