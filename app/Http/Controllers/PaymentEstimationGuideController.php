<?php

namespace App\Http\Controllers;

use App\Models\PaymentEstimationGuide;
use App\Http\Requests\StorePaymentEstimationGuideRequest;
use App\Http\Requests\UpdatePaymentEstimationGuideRequest;
use Illuminate\Http\Request;

class PaymentEstimationGuideController extends Controller
{

    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      * @OA\Get(
      *     path="/payment-estimation-guides",
      *     operationId="getPaymentEstimationGuide",
      *     tags={"PaymentEstimationGuide"},
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
      *         description="Show PaymentEstimationGuides all."
      *     ),
      *     @OA\Response(
      *         response="default",
      *         description="error."
      *     )
      *  )
      */
    public function index(Request $request)
    {
        $paymentEstimationGuides = PaymentEstimationGuide::filters($request->all())->search($request->all());
        return response()->json($paymentEstimationGuides, 200);
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
      * @param  \App\Http\Requests\StorePaymentEstimationGuideRequest  $request
      * @return \Illuminate\Http\Response
      * @OA\Post(
      *   path="/payment-estimation-guides",
      *   summary="Creates a new PaymentEstimationGuide",
      *   description="Creates a new PaymentEstimationGuide",
      *   tags={"PaymentEstimationGuide"},
      *   security={{"passport": {"*"}}},
      *   @OA\RequestBody(
      *       @OA\MediaType(
      *           mediaType="application/json",
      *           @OA\Schema(ref="#/components/schemas/PaymentEstimationGuide")
      *       )
      *   ),
      *   @OA\Response(
      *       @OA\MediaType(mediaType="application/json"),
      *       response=200,
      *       description="The PaymentEstimationGuide resource created",
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
    public function store(StorePaymentEstimationGuideRequest $request)
    {
        $paymentEstimationGuide = new PaymentEstimationGuide();
        $paymentEstimationGuide->guide_id = $request->guide_id;
        $paymentEstimationGuide->guide_service_cost_id = $request->guide_service_cost_id;
        $paymentEstimationGuide->amount = $request->amount;
        $paymentEstimationGuide->price = $request->price;
        $paymentEstimationGuide->user_created_id = $request->user_created_id;
        $paymentEstimationGuide->save();
        return response()->json($paymentEstimationGuide, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentEstimationGuide  $paymentEstimationGuide
     * @return \Illuminate\Http\Response
     * @OA\Get(
     *   path="/payment-estimation-guides/{id}",
     *   operationId="getPaymentEstimationGuideById",
     *   tags={"PaymentEstimationGuide"},
     *   summary="Get PaymentEstimationGuide information",
     *   description="Returns PaymentEstimationGuide data",
     *   @OA\Parameter(
     *      name="id",
     *      description="PaymentEstimationGuide id",
     *      required=true,
     *      in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/PaymentEstimationGuide")
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
     *   )
     */
    public function show(PaymentEstimationGuide $paymentEstimationGuide)
    {
        return response($paymentEstimationGuide, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentEstimationGuide  $paymentEstimationGuide
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentEstimationGuide $paymentEstimationGuide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * @param  \App\Http\Requests\UpdatePaymentEstimationGuideRequest  $request
     * @param  \App\Models\PaymentEstimationGuide  $paymentEstimationGuide
     * @return \Illuminate\Http\Response
     * @OA\Put(
     *  path="/payment-estimation-guides/{id}",
     *  operationId="updatePaymentEstimationGuide",
     *  tags={"PaymentEstimationGuide"},
     *  summary="Update existing PaymentEstimationGuide",
     *  description="Returns updated PaymentEstimationGuide data",
     *  @OA\Parameter(
     *      name="id",
     *      description="PaymentEstimationGuide id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/PaymentEstimationGuide")
     *   ),
     *   @OA\Response(
     *      response=202,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/PaymentEstimationGuide")
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
    public function update(UpdatePaymentEstimationGuideRequest $request, PaymentEstimationGuide $paymentEstimationGuide)
    {
        $paymentEstimationGuide->guide_id = $request->guide_id;
        $paymentEstimationGuide->guide_service_cost_id = $request->guide_service_cost_id;
        $paymentEstimationGuide->amount = $request->amount;
        $paymentEstimationGuide->price = $request->price;
        $paymentEstimationGuide->user_updated_id = $request->user_updated_id;
        $paymentEstimationGuide->update();
        return response()->json($paymentEstimationGuide, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentEstimationGuide  $paymentEstimationGuide
     * @return \Illuminate\Http\Response
     * @OA\Delete(
     *  path="/payment-estimation-guides/{id}",
     *  operationId="deletePaymentEstimationGuide",
     *  tags={"PaymentEstimationGuide"},
     *  summary="Delete existing PaymentEstimationGuide",
     *  description="Deletes a record and returns no content",
     *  @OA\Parameter(
     *      name="id",
     *      description="PaymentEstimationGuide id",
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
     */
    public function destroy(PaymentEstimationGuide $paymentEstimationGuide)
    {
        $paymentEstimationGuide->delete();
        return response('the data was deleted successfully', 200);
    }

    public function storeMany(Request $request)
    {
        info($request->all());
        collect($request->paymentEstimateGuides)
            ->each(function($paymentEstimationGuide) {
                info($paymentEstimationGuide);
                PaymentEstimationGuide::create($paymentEstimationGuide);
            });

        return response()->json('creted success', 201);
    }
}
