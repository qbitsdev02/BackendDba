<?php

namespace App\Http\Controllers;

use App\Models\BillElectronicPayment;
use App\Models\PurchasePayment;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/finances/movements",
     *     summary="Show movements",
     *     tags={"Finance"},
     *     @OA\Parameter(
     *       name="paginate",
     *       in="query",
     *       description="paginate",
     *       required=false,
     *       @OA\Schema(
     *           title="Paginate",
     *           example="true",
     *           type="boolean",
     *           description="The Paginate data"
     *       )
     *     ),
     *     @OA\Parameter(
     *       name="sortField",
     *       in="query",
     *       description="Movement resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="id",
     *           description="The unique identifier of a Movement resource"
     *       )
     *     ),
     *     @OA\Parameter(
     *       name="sortOrder",
     *       in="query",
     *       description="Movement resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="desc",
     *           description="The unique identifier of a Movement resource"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="perPage",
     *       in="query",
     *       description="Sort order field",
     *       @OA\Schema(
     *           title="perPage",
     *           type="number",
     *           default="10",
     *           description="The unique identifier of a Movement resource"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataSearch",
     *       in="query",
     *       description="Movement resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="Search data"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataFilter",
     *       in="query",
     *       description="Movement resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="The unique identifier of a Movement resource"
     *       )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Show Movement all."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="error."
     *     )
     *  )
    */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function movements()
    {
        $purchasePayment = PurchasePayment::select(
            'amount',
            'payment_method_id',
            'purchase_id',
            'payment_destination_id',
            'coin_id',
            'balance',
            'created_at'
        )
            ->with(
                'paymentMethod:id,name',
                'paymentDestination:id,name',
                'coin:id,name',
                'purchase:id,voucher_type_id',
                'purchase.voucherType:id,name'
            )
            ->without('purchase.purchaseDetails')
            ->get();

        $billElectronicPayment = BillElectronicPayment::select(
            'amount',
            'payment_method_id',
            'bill_electronic_id',
            'payment_destination_id',
            'coin_id',
            'balance',
            'created_at'
        )
        ->with(
            'paymentMethod:id,name',
            'paymentDestination:id,name',
            'coin:id,name',
            'billElectronic:id,voucher_type_id',
            'billElectronic.voucherType:id,name'
        )
        ->get();

        return response([...$purchasePayment, ...$billElectronicPayment], 200);
    }
}
