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
Route::resource('concept-types', ConceptTypeController::class);
Route::resource('operation-types', OperationTypeController::class);
Route::resource('entities', EntityController::class);
Route::resource('fields', FieldController::class);
Route::resource('organizations', OrganizationController::class);
Route::resource('beneficiaries', BeneficiaryController::class);
Route::resource('coins', CoinController::class);
Route::resource('responsables', ResponsableController::class);
Route::resource('orders', OrderController::class);
Route::resource('concepts', ConceptController::class);
Route::resource('fields-supervisor', FieldSupervisorController::class);
Route::resource('material-suppliers', MaterialSupplierController::class);
Route::resource('clients', ClientController::class);
Route::resource('delivery-notes', DeliveryNoteController::class);
Route::resource('states', StateController::class);
Route::resource('material-supplier-types', MaterialSupplierTypeController::class);
Route::resource('guides', GuideController::class);
Route::resource('trailers', TrailerController::class);
Route::resource('vehicles', VehicleController::class);
Route::resource('drivers', DriverController::class);
Route::resource('vehicle-types', VehicleTypeController::class);
Route::resource('sworn-declarations', SwornDeclarationController::class);
Route::resource('trailers', TrailerController::class);
