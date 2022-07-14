<?php

use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ProviderTypeController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\TicketController;
use Illuminate\Routing\Router;
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
$router->resource('tickets', TicketController::class);

Route::group([
    'prefix' => 'authentication',
], function ($router) {
    // Routes
    $router->post('/login', 'Login\Login@authentication');
    $router->post('/refresh-token', 'Login\RefreshToken@refreshToken');
});

Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    $router->resource('users', UserController::class);
    $router->resource('roles', RoleController::class);
    $router->resource('sections', SectionController::class);
    $router->resource('concept-types', ConceptTypeController::class);
    $router->resource('operation-types', OperationTypeController::class);
    $router->resource('entities', EntityController::class);
    $router->resource('fields', FieldController::class);
    $router->resource('organizations', OrganizationController::class);
    $router->resource('beneficiaries', BeneficiaryController::class);
    $router->resource('coins', CoinController::class);
    $router->resource('responsables', ResponsableController::class);
    $router->resource('orders', OrderController::class);
    $router->resource('concepts', ConceptController::class);
    $router->resource('fields-supervisor', FieldSupervisorController::class);
    $router->resource('clients', ClientController::class);
    $router->resource('delivery-notes', DeliveryNoteController::class);
    $router->resource('states', StateController::class);
    $router->resource('providers', ProviderController::class);
    $router->resource('providers-types', ProviderTypeController::class);
    $router->resource('guides', GuideController::class);
    $router->resource('trailers', TrailerController::class);
    $router->resource('vehicles', VehicleController::class);
    $router->resource('drivers', DriverController::class);
    $router->resource('vehicle-types', VehicleTypeController::class);
    $router->resource('sworn-declarations', SwornDeclarationController::class);
    $router->resource('trailers', TrailerController::class);
    $router->resource('unit-of-measurements', UnitOfMeasurementController::class);
    $router->resource('rates', RateController::class);
});
