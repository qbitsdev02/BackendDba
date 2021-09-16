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
Route::resource('products', ProductController::class);
Route::resource('attribute-types', AttributeTypeController::class);
Route::prefix('bill-electronic')
    ->group(function () {
        Route::get('/{id}/note', 'CreditNoteController@index');
        Route::post('/{id}/note', 'CreditNoteController@store');
    });
Route::resource('brands', BrandController::class);
Route::resource('categories', CategoryController::class);
Route::resource('client-types', ClientTypeController::class);
Route::resource('clients', ClientController::class);
Route::resource('document-types', DocumentTypeController::class);
Route::resource('operation-types', OperationTypeController::class);
Route::resource('voucher-types', VoucherTypeController::class);
Route::resource('coins', CoinController::class);
Route::resource('branch-offices', BranchOfficeController::class);
Route::resource('sellers', SellerController::class);
Route::resource('bill-electronics', BillElectronicController::class);
Route::resource('series', SerieController::class);
Route::resource('payment-methods', PaymentMethodController::class);
Route::resource('payment-destinations', PaymentDestinationController::class);
Route::resource('guides', GuideController::class);
Route::resource('providers', ProviderController::class);
Route::resource('purchases', PurchaseController::class);
Route::resource('quotations', QuotationController::class);
Route::resource('voucher-type-notes', VoucherTypeNoteController::class);
Route::resource('type-of-credit-notes', TypeOfCreditNoteController::class);
Route::resource('orders', OrderController::class);
Route::resource('seller-commissions', SellerCommissionController::class);
Route::resource('product-commissions', ProductCommissionController::class);
Route::resource('warehouses', WarehouseController::class);
Route::resource('inventories',InventoryController::class);
Route::resource('kardex-reports', KardexReportController::class);
Route::resource('devolutions', DevolutionController::class);
Route::resource('devolution-reasons', DevolutionReasonController::class);
Route::resource('transfers', TransferController::class);
Route::resource('purchase-orders', PurchaseOrderController::class);
Route::resource('budget-requests', BudgetRequestController::class);
Route::resource('transfer-modes', TransferModeController::class);
Route::resource('transfer-subjects', TransferSubjectController::class);
Route::resource('measurement-units', MeasurementUnitController::class);
Route::resource('expenses', ExpenseController::class);
Route::resource('expense-reasons', ExpenseReasonController::class);
Route::resource('sections', SectionController::class);
Route::get('ruc/{ruc}', 'ApiTerceroController@getRuc');
Route::get('exchange-rate/', 'ApiTerceroController@exchangeRate');

Route::prefix('finances')
    ->group(function () {
        Route::get('movements', 'FinanceController@movements');
    });
