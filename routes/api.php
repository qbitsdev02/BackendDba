<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([
    'prefix' => 'authentication',
], function ($router) {
    // Routes
    $router->post('/login', 'Login\Login@authentication');
    $router->post('/refresh-token', 'Login\RefreshToken@refreshToken');
});

Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);
Route::resource('sections', SectionController::class);
Route::resource('egress-types', EgressTypeController::class);
Route::resource('operation-types', OperationTypeController::class);
Route::resource('entities', EntityController::class);
Route::resource('fields', FieldController::class);
Route::resource('organizations', OrganizationController::class);
Route::resource('coins', CoinController::class);
