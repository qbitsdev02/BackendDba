<?php

namespace App\Http\Controllers;

use App\Models\OperationType;
use App\Http\Requests\StoreOperationTypeRequest;
use App\Http\Requests\UpdateOperationTypeRequest;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @OA\Get(
     *     path="/payment-methods",
     *     operationId="getPaymentMethod",
     *     tags={"PaymentMethod"},
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
     *         description="Show OperationTypes all."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="error."
     *     )
     *  )
     */
    public function index(Request $request)
    {
        $operationType = PaymentMethod::filters($request->all())->search($request->all());
        return response()->json($operationType, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOperationTypeRequest  $request
     * @return \Illuminate\Http\Response
     * @OA\Post(
     *   path="/payment-methods",
     *   summary="Creates a new PaymentMethod",
     *   description="Creates a new PaymentMethod",
     *   tags={"PaymentMethod"},
     *   security={{"passport": {"*"}}},
     *   @OA\RequestBody(
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/PaymentMethod")
     *       )
     *   ),
     *   @OA\Response(
     *       @OA\MediaType(mediaType="application/json"),
     *       response=200,
     *       description="The OperationType resource created",
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
    public function store(StoreOperationTypeRequest $request)
    {
        $OperationType = new PaymentMethod();
        $OperationType->name = $request->name;
        $OperationType->description = $request->description;
        $OperationType->user_created_id = $request->user_created_id;
        $OperationType->save();
        return response()->json($OperationType, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OperationType  $OperationType
     * @return \Illuminate\Http\Response
     * @OA\Get(
     *   path="/payment-methods/{id}",
     *   operationId="getPaymentMethodById",
     *   tags={"PaymentMethod"},
     *   summary="Get PaymentMethod information",
     *   description="Returns PaymentMethod data",
     *   @OA\Parameter(
     *      name="id",
     *      description="PaymentMethod id",
     *      required=true,
     *      in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/PaymentMethod")
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
    public function show(PaymentMethod $OperationType)
    {
        return response($OperationType, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * @param  \App\Http\Requests\UpdateOperationTypeRequest  $request
     * @param  \App\Models\OperationType  $OperationType
     * @return \Illuminate\Http\Response
     * @OA\Put(
     *  path="/payment-methods/{id}",
     *  operationId="updatePaymentMethod",
     *  tags={"PaymentMethod"},
     *  summary="Update existing PaymentMethod",
     *  description="Returns updated PaymentMethod data",
     *  @OA\Parameter(
     *      name="id",
     *      description="PaymentMethod id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/PaymentMethod")
     *   ),
     *   @OA\Response(
     *      response=202,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/PaymentMethod")
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
    public function update(UpdateOperationTypeRequest $request, PaymentMethod $OperationType)
    {
        $OperationType->name = $request->name;
        $OperationType->description = $request->description;
        $OperationType->user_created_id = $request->user_created_id;
        $OperationType->update();
        return response()->json($OperationType, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OperationType  $PaymentMethod
     * @return \Illuminate\Http\Response
     * @OA\Delete(
     *  path="/payment-methods/{id}",
     *  operationId="deletePaymentMethod",
     *  tags={"PaymentMethod"},
     *  summary="Delete existing PaymentMethod",
     *  description="Deletes a record and returns no content",
     *  @OA\Parameter(
     *      name="id",
     *      description="PaymentMethod id",
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
    public function destroy(PaymentMethod $OperationType)
    {
        $OperationType->delete();
        return response('the data was deleted successfully', 200);
    }
}
