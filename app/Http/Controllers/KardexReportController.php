<?php

namespace App\Http\Controllers;

use App\Models\BillElectronicDetail;
use App\Models\KardexReport;
use App\Models\PurchaseDetail;
use Illuminate\Http\Request;

class KardexReportController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/kardex-reports",
     *     summary="Show kardaex report",
     *     tags={"KardexReport"},
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
     *       description="KardexReport resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="id",
     *           description="The unique identifier of a KardexReport resource"
     *       )
     *     ),
     *     @OA\Parameter(
     *       name="sortOrder",
     *       in="query",
     *       description="KardexReport resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="desc",
     *           description="The unique identifier of a KardexReport resource"
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
     *           description="The unique identifier of a KardexReport resource"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataSearch",
     *       in="query",
     *       description="KardexReport resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="Search data"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataFilter",
     *       in="query",
     *       description="KardexReport resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="The unique identifier of a KardexReport resource"
     *       )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Show kardaex report all."
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
    public function index(Request $request)
    {
        // $kardexReports = KardexReport::with(['reportable', 'product:id,name'])
        //     ->filters($request->all())
        //     ->betweenDate($request->all())
        //     ->search($request->all());


        $billDetails = BillElectronicDetail::select('product_id', 'created_at', 'amount', 'bill_electronic_id', 'stock')
            ->with('product:id,description,name')
            ->where('product_id', $request->product_id)
            ->betweenDate($request->all())
            ->orderBy('created_at', 'desc')
            ->get();

        $purchaseDetails = PurchaseDetail::select('product_id', 'created_at', 'amount', 'purchase_id', 'stock')
            ->with('product:id,description,name')
            ->where('product_id', $request->product_id)
            ->betweenDate($request->all())
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([...$billDetails, ...$purchaseDetails], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KardexReport  $kardexReport
     * @return \Illuminate\Http\Response
     */
    public function show(KardexReport $kardexReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KardexReport  $kardexReport
     * @return \Illuminate\Http\Response
     */
    public function edit(KardexReport $kardexReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KardexReport  $kardexReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KardexReport $kardexReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KardexReport  $kardexReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(KardexReport $kardexReport)
    {
        //
    }
}
