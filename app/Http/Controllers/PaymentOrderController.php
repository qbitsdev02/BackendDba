<?php

namespace App\Http\Controllers;

use App\Models\PaymentOrder;
use App\Http\Requests\StorePaymentOrderRequest;
use App\Http\Requests\UpdatePaymentOrderRequest;
use App\Http\Resources\PaymentOrderResource;
use Illuminate\Http\Request;

class PaymentOrderController extends Controller
{

    /**
     * Create the controller instance to Authorizing Resource Controller.
     *
     * You may make use of the (authorizeResource) method in your controller's constructor.
     * This method will attach the appropriate can middleware definitions to the resource controller's methods.
     */
    public function __construct()
    {
        $this->authorizeResource(PaymentOrder::class, 'payment_order');
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    *
    * @OA\Get(
    *     path="/payment-orders",
    *     operationId="getpaymetOrder",
    *     tags={"PaymentOrder"},
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
    *       name="sortBy",
    *       in="query",
    *       description="turno resource name",
    *       required=false,
    *       @OA\Schema(
    *           type="string",
    *           example="id",
    *           description="The unique identifier of a turno resource"
    *       )
    *     ),
    *     @OA\Parameter(
    *       name="sortOrder",
    *       in="query",
    *       description="turno resource name",
    *       required=false,
    *       @OA\Schema(
    *           type="string",
    *           example="desc",
    *           description="The unique identifier of a turno resource"
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
    *           description="The unique identifier of a curso resource"
    *       )
    *      ),
    *     @OA\Parameter(
    *       name="dataSearch",
    *       in="query",
    *       description="turno resource name",
    *       required=false,
    *       @OA\Schema(
    *           type="string",
    *           description="Search data"
    *       )
    *      ),
    *     @OA\Parameter(
    *       name="dataFilter",
    *       in="query",
    *       description="turno resource name",
    *       required=false,
    *       @OA\Schema(
    *           type="string",
    *           description="The unique identifier of a turno resource"
    *       )
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="payment orders all."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="error."
    *     )
    *  )
    */
    public function index(Request $request)
    {

        $payment_order = PaymentOrder::filters($request->all())
            ->search($request->all());

            return (PaymentOrderResource::collection($payment_order))->additional(
                [
                    'message' => 'successfully response'
                ],200
            );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePaymentOrderRequest  $request
     * @return \Illuminate\Http\Response
     *
     * @OA\Post(
     *   path="/payment-orders",
     *   summary="Creates a new Payment-order",
     *   description="Creates a new Payment-order",
     *   tags={"PaymentOrder"},
     *   security={{"passport": {"*"}}},
     *   @OA\RequestBody(
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/PaymentOrder")
     *       )
     *   ),
     *   @OA\Response(
     *       @OA\MediaType(mediaType="application/json"),
     *       response=200,
     *       description="The paymentOrder resource created",
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
    public function store(StorePaymentOrderRequest $request)
    {
        $payment_order = new PaymentOrder();
        $payment_order->description = $request->description;
        $payment_order->status = $request->status;
        $payment_order->amount = $request->amount;
        $payment_order->operation_type_id = $request->operation_type_id;
        $payment_order->organization_id = 1;
        $payment_order->country_id = 1;
        $payment_order->concept_id = $request->concept_id;
        $payment_order->ownerable_id = $request->ownerable_id;
        $payment_order->ownerable_type = $request->ownerable_type;
        $payment_order->entity_id = $request->entity_id;
        $payment_order->coin_id = $request->coin_id;
        $payment_order->payment_date = $request->payment_date;
        $payment_order->user_created_id = $request->user_created_id;

        $payment_order->save();

        return (new PaymentOrderResource($payment_order))->additional(
            [
                "message" => "successfully registerd payment order"
            ],200
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentOrder  $paymentOrder
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentOrder $paymentOrder)
    {
        return (new PaymentOrderResource($paymentOrder))->additional(
            [
                "message" => "successfully response"
            ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaymentOrderRequest  $request
     * @param  \App\Models\PaymentOrder  $PaymentOrder
     * @return \Illuminate\Http\Response
     *
     * @OA\Put(
     *      path="/payment-orders/{id}",
     *      operationId="updatepaymentOrder",
     *      tags={"PaymentOrder"},
     *      summary="Update existing payment order",
     *      description="Returns updated rate data",
     *  @OA\Parameter(
     *      name="id",
     *      description="payment_order id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/PaymentOrder")
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/PaymentOrder")
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=401,
     *      description="Unauthenticated",
     *   ),
     *   @OA\Response(
     *      response=403,
     *      description="Forbidden"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="Resource Not Found"
     *   )
     * )
     */
    public function update(UpdatePaymentOrderRequest $request, PaymentOrder $payment_order)
    {
        $payment_order->description = $request->description;
        $payment_order->status = $request->status;
        $payment_order->amount = $request->amount;
        $payment_order->operation_type_id = $request->operation_type_id;
        $payment_order->concept_id = $request->concept_id;
        $payment_order->ownerable_id = $request->ownerable_id;
        $payment_order->ownerable_type = $request->ownerable_type;
        $payment_order->entity_id = $request->entity_id;
        $payment_order->coin_id = $request->coin_id;
        $payment_order->payment_date = $request->payment_date;
        $payment_order->user_created_id = $request->user_created_id;

        $payment_order->update();

        return (new PaymentOrderResource($payment_order))->additional(
            [
                "message" => "successfully updated payment order"
            ],200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentOrder  $PaymentOrder
     * @return \Illuminate\Http\Response
     *
     *Remove the specified resource from storage.
     *
     * @OA\Delete(
     *  path="/payment-orders/{id}",
     *  operationId="deletepaymentOrder",
     *  tags={"PaymentOrder"},
     *  summary="Delete existing payment order",
     *  description="Deletes a record and returns no content",
     *  @OA\Parameter(
     *      name="id",
     *      description="payment_order id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\Response(
     *      response=204,
     *      description="Successful operation",
     *      @OA\JsonContent()
     *  ),
     *  @OA\Response(
     *      response=401,
     *      description="Unauthenticated",
     *  ),
     *  @OA\Response(
     *      response=403,
     *      description="Forbidden"
     *  ),
     *  @OA\Response(
     *      response=404,
     *      description="Resource Not Found"
     *  )
     * )
     *
     */
    public function destroy(PaymentOrder $paymentOrder)
    {
        $paymentOrder->delete();
        return response()->json(
            [
                "messasge" => "data was delete successfully"
            ]
        );
    }
}
