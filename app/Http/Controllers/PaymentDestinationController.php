<?php

namespace App\Http\Controllers;

use App\Models\PaymentDestination;
use Illuminate\Http\Request;

class PaymentDestinationController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/payment-destinations",
     *     summary="Show payment destinations",
     *     tags={"PaymentDestination"},
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
     *       description="PaymentDestination resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="id",
     *           description="The unique identifier of a PaymentDestination resource"
     *       )
     *     ),
     *     @OA\Parameter(
     *       name="sortOrder",
     *       in="query",
     *       description="PaymentDestination resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="desc",
     *           description="The unique identifier of a PaymentDestination resource"
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
     *           description="The unique identifier of a PaymentDestination resource"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataSearch",
     *       in="query",
     *       description="PaymentDestination resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="Search data"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataFilter",
     *       in="query",
     *       description="PaymentDestination resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="The unique identifier of a PaymentDestination resource"
     *       )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Show payment destinations all."
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
        $paymentDestinations = PaymentDestination::filters($request->all())->search($request->all());
        return response()->json($paymentDestinations, 200);
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
        *   path="/api/payment-destinations",
        *   summary="Creates a new payment destinations",
        *   description="Creates a new payment destinations",
        *   tags={"PaymentDestination"},
        *   security={{"passport": {"*"}}},
        *   @OA\RequestBody(
        *       @OA\MediaType(
        *           mediaType="application/json",
        *           @OA\Schema(ref="#/components/schemas/PaymentDestination")
        *       )
        *   ),
        *   @OA\Response(
        *       @OA\MediaType(mediaType="application/json"),
        *       response=200,
        *       description="The PaymentDestination resource created",
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
        $paymentDestination = new PaymentDestination();
        $paymentDestination->name = $request->name;
        $paymentDestination->description = $request->description;
        $paymentDestination->user_created_id = $request->user_created_id;
        $paymentDestination->save();
        return response()->json($paymentDestination, 201);
    }
    /**
     * @OA\Get(
     *      path="/api/payment-destinations/{id}",
     *      operationId="getPaymentDestinationById",
     *      tags={"PaymentDestination"},
     *      summary="Get PaymentDestination information",
     *      description="Returns PaymentDestination data",
     *      @OA\Parameter(
     *          name="id",
     *          description="PaymentDestination id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/PaymentDestination")
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
     * @param  \App\Models\PaymentDestination  $paymentDestination
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentDestination $paymentDestination)
    {
        return response()->json($paymentDestination, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentDestination  $paymentDestination
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentDestination $paymentDestination)
    {
        //
    }
    /**
     * @OA\Put(
     *      path="/api/payment-destinations/{id}",
     *      operationId="updatePaymentDestination",
     *      tags={"PaymentDestination"},
     *      summary="Update existing PaymentDestination",
     *      description="Returns updated PaymentDestination data",
     *      @OA\Parameter(
     *          name="id",
     *          description="PaymentDestination id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/PaymentDestination")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/PaymentDestination")
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
     * @param  \App\Models\PaymentDestination  $paymentDestination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentDestination $paymentDestination)
    {
        $paymentDestination->name = $request->name;
        $paymentDestination->description = $request->description;
        $paymentDestination->user_updated_id = $request->user_updated_id;
        $paymentDestination->update();
        return response()->json($paymentDestination, 200);
    }
    /**
     * @OA\Delete(
     *      path="/api/payment-destinations/{id}",
     *      operationId="deleteProject",
     *      tags={"PaymentDestination"},
     *      summary="Delete existing PaymentDestination",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="PaymentDestination id",
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
     * @param  \App\Models\PaymentDestination  $paymentDestination
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentDestination $paymentDestination)
    {
        $paymentDestination->delete();
        return response()->json('succesfull delete', 200);
    }
}
