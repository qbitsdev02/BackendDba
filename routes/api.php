<?php

use App\Http\Controllers\ActiveController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PaymentOrderController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\PortController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ProviderTypeController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\StaffTypeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TransactionController;
use App\Http\Resources\CompanyResource;
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
    $router->group(['prefix' => 'plaid'], function ($router) {
        $router->post('create-token', 'PlaidController@createToken')->name('createToken');
        $router->get('transactions', 'PlaidController@transactions')->name('transactions');
        $router->post('exchange-token', 'PlaidController@exchangeToken')->name('exchangeToken');
    });
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
    $router->resource('tickets', TicketController::class);
    $router->resource('payment-orders', PaymentOrderController::class);
    $router->resource('ports', PortController::class);
    $router->resource('staff-types', StaffTypeController::class);
    $router->resource('personals', PersonalController::class);
    $router->resource('actives', ActiveController::class);
    $router->resource('attributes', AttributeController::class);
    $router->resource('companies', CompanyController::class);
    $router->resource('transactions', TransactionController::class);
    $router->resource('banks', BankController::class);
    $router->resource('categories', CategoryController::class);
});
