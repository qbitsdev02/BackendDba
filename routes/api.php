<?php

use App\Http\Controllers\ActiveController;
use App\Http\Controllers\ApiTercerosController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\CashFlowController;
use App\Http\Controllers\CashFlowReportController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\DisbursementController;
use App\Http\Controllers\DisbursementRequestController;
use App\Http\Controllers\FieldCashFlowController;
use App\Http\Controllers\GuideOwnerController;
use App\Http\Controllers\MasterReportController;
use App\Http\Controllers\MasterSheetController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PaymentEstimationGuideController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\PaymentOrderController;
use App\Http\Controllers\PaymentOrderReportController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\PortController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ProviderTypeController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StaffTypeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\VoucherTypeController;
use App\Http\Resources\CompanyResource;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
    $router->post('/login', 'Login\Login@authentication')->name('login');
    $router->post('/refresh-token', 'Login\RefreshToken@refreshToken');
});
$router->get('cash-flows/export', [CashFlowController::class, 'export'])->name('exportCashFlow');
$router->get('master-sheets/export', [MasterSheetController::class, 'export'])->name('export');

Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    $router->group(['prefix' => 'plaid'], function ($router) {
        $router->post('create-token', 'PlaidController@createToken')->name('createToken');
        $router->get('transactions', 'PlaidController@transactions')->name('transactions');
        $router->post('exchange-token', 'PlaidController@exchangeToken')->name('exchangeToken');
        $router->get('categories', 'PlaidController@getCategories')->name('getCategories');
    });
    $router->resource('users', UserController::class);
    $router->resource('roles', RoleController::class);
    $router->resource('sections', SectionController::class);
    $router->resource('concept-types', ConceptTypeController::class);
    $router->resource('payment-methods', PaymentMethodController::class);
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
    $router->get('balance', 'FieldCashFlowController@balance')->name('balance');
    $router->post('change-status', 'FieldCashFlowController@changeStatus')->name('changeStatus');
    $router->resource('field-cash-flows', FieldCashFlowController::class);
    $router->resource('branch-offices', BranchOfficeController::class);
    $router->get('notifications', [NotificationController::class, 'getAll'])->name('getAll');
    $router->resource('disbursements', DisbursementController::class);
    $router->resource('voucher-types', VoucherTypeController::class);
    $router->resource('contracts', ContractController::class);
    $router->resource('services', ServiceController::class);
    $router->resource('disbursement-requests', DisbursementRequestController::class);
    $router->resource('guide-service-costs', GuideServiceCostController::class);
    $router->post('store-all-payment-estimation-guides', [PaymentEstimationGuideController::class, 'storeMany']);
    $router->resource('payment-estimation-guides', PaymentEstimationGuideController::class);
    $router->resource('guide-owners', GuideOwnerController::class);
    $router->resource('lot-of-guides', LotOfGuideController::class);
    $router->resource('chart-of-accounts', ChartOfAccountController::class);

    Route::group([
        'prefix' => 'master-sheets',
    ], function ($router) {
        $router->post('import-field-sheets', [MasterSheetController::class, 'importData'])->name('importData');
        // $router->get('export', [MasterSheetController::class, 'export'])->name('export');
        $router->get('filter-selects', [MasterSheetController::class, 'filterSelects'])->name('filterSelects');
        $router->get('reports/totales', [MasterReportController::class, 'totales'])->name('totales');
        $router->get('reports/graph-productions', [MasterReportController::class, 'graphProductions'])->name('graphProductions');
    });
    Route::group([
        'prefix' => 'cash-flows',
    ], function ($router) {
        $router->post('import', [CashFlowController::class, 'importData'])->name('importDataCashFlow');
       // $router->get('export', [CashFlowController::class, 'export'])->name('exportCashFlow');
        $router->get('filter-selects', [CashFlowController::class, 'filterSelects'])->name('CashFlowFilterSelects');
        $router->get('balance', [CashFlowReportController::class, 'getBalance'])->name('getBalance');
        // $router->get('reports/totales', [MasterReportController::class, 'totales'])->name('totales');
        // $router->get('reports/graph-productions', [MasterReportController::class, 'graphProductions'])->name('graphProductions');
    });
    $router->get('document-number', [ApiTercerosController::class, 'getDocumentNumber'])->name('getDocumentNumber');
    $router->resource('cash-flows', CashFlowController::class);
    $router->resource('master-sheets', MasterSheetController::class);

    Route::group([
        'prefix' => 'reports',
    ], function ($router) {
        $router->get('get-total-for-status', [PaymentOrderReportController::class, 'getTotalForStatus'])->name('getTotalForStatus');
    });
});
