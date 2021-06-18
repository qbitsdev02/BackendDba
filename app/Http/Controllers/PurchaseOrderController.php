<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/purchase-orders",
     *     summary="Show purchaseOrder",
     *     tags={"PurchaseOrder"},
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
     *       description="Purchase resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="id",
     *           description="The unique identifier of a PurchaseOrder resource"
     *       )
     *     ),
     *     @OA\Parameter(
     *       name="sortOrder",
     *       in="query",
     *       description="Purchase resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="desc",
     *           description="The unique identifier of a PurchaseOrder resource"
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
     *           description="The unique identifier of a PurchaseOrder resource"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataSearch",
     *       in="query",
     *       description="Purchase resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="Search data"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataFilter",
     *       in="query",
     *       description="Purchase resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="The unique identifier of a PurchaseOrder resource"
     *       )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Show purchaseOrder all."
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
        $purchaseOrderOrders = PurchaseOrder::with(
            'purchaseOrderDetails',
            'provider:id,name',
            'coin:id,name'
        )
            ->filters($request->all())
            ->search($request->all());
        return response()->json($purchaseOrderOrders, 200);
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
     * @OA\Post(
     *   path="/api/purchase-orders",
     *   summary="Creates a new purchaseOrder",
     *   description="Creates a new purchaseOrder",
     *   tags={"PurchaseOrder"},
     *   security={{"passport": {"*"}}},
     *   @OA\RequestBody(
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/PurchaseOrder")
     *       )
     *   ),
     *   @OA\Response(
     *       @OA\MediaType(mediaType="application/json"),
     *       response=200,
     *       description="The PurchaseOrder resource created",
     *   ),
     *   @OA\Response(
     *       @OA\MediaType(mediaType="application/json"),
     *       response=401,
     *       description="Unauthenticated."
     *   ),
     *   @OA\Response(
     *       @OA\MediaType(mediaType="application/json"),
     *       response="default",
     *       description="an ""unexpected"" error",
     *   )
     * )
    */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $purchaseOrder = new PurchaseOrder();
        $purchaseOrder->payment_method_id = $request->payment_method_id;
        $purchaseOrder->provider_id = $request->provider_id;
        $purchaseOrder->coin_id = $request->coin_id;
        $purchaseOrder->exchange_rate = $request->exchange_rate;
        $purchaseOrder->created_at = $request->created_at;
        $purchaseOrder->expiration_date = $request->expiration_date;
        $purchaseOrder->user_created_id = $request->user_created_id;
        $purchaseOrder->save();
        return response()->json($purchaseOrder, 201);
    }
    /**
     * @OA\Get(
     *      path="/api/purchase-orders/{id}",
     *      tags={"PurchaseOrder"},
     *      summary="Get PurchaseOrder information",
     *      description="Returns PurchaseOrder data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Purchase id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/PurchaseOrder")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseOrder $purchaseOrder)
    {
        return response()->json($purchaseOrder, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseOrder $purchaseOrder)
    {
        //
    }
    /**
     * @OA\Put(
     *      path="/api/purchase-orders/{id}",
     *      operationId="updatepurchases",
     *      tags={"PurchaseOrder"},
     *      summary="Update existing purchaseOrders",
     *      description="Returns updated purchaseOrders data",
     *      @OA\Parameter(
     *          name="id",
     *          description="purchases id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/PurchaseOrder")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/PurchaseOrder")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->payment_method_id = $request->payment_method_id;
        $purchaseOrder->provider_id = $request->provider_id;
        $purchaseOrder->coin_id = $request->coin_id;
        $purchaseOrder->igv = $request->igv;
        $purchaseOrder->exchange_rate = $request->exchange_rate;
        $purchaseOrder->created_at = $request->created_at;
        $purchaseOrder->expiration_date = $request->expiration_date;
        $purchaseOrder->user_created_id = $request->user_created_id;
        $purchaseOrder->updated_at = \Carbon\Carbon::now();
        $purchaseOrder->update();
        return response()->json($purchaseOrder, 200);
    }
    /**
     * @OA\Delete(
     *      path="/api/purchase-orders/{id}",
     *      tags={"PurchaseOrder"},
     *      summary="Delete existing PurchaseOrder",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Purchase id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->delete();
        return response()->json("delete succefull", 200);
    }
}
