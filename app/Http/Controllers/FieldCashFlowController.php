<?php

namespace App\Http\Controllers;

use App\Models\FieldCashFlow;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFieldCashFlowRequest;
use App\Http\Requests\UpdateFieldCashFlowRequest;
use App\Http\Resources\FieldCashFlowResource;
use Illuminate\Http\Request;

class FieldCashFlowController extends Controller
{

    /**
     *
     */
    // public function __construct()
    // {
    //     $this->authorizeResource(FieldCashFlow::class,'field_cash_flow');
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
      *     path="/field-cash-flows",
      *     operationId="getfieldCashFlow",
      *     tags={"FieldCashFlow"},
      *     @OA\Parameter(
      *       name="paginate",
      *       in="query",
      *       description="paginate",
      *       required=false,
      *       @OA\Schema(
      *           title="Paginate",
      *           example="true",
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
      *         description="Field cash flow all."
      *     ),
      *     @OA\Response(
      *         response="default",
      *         description="error."
      *     )
      *  )
     */
    public function index(Request $request)
    {
        $cash_flows = FieldCashFlow::filters($request->all())
            ->search($request->all());

            return ( FieldCashFlowResource::collection($cash_flows))->additional(
                [
                    'message:' => 'succesfully response'
                ],200
            );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFieldCashFlowRequest  $request
     * @return \Illuminate\Http\Response
     *
     * @OA\Post(
    *   path="/field-cash-flows",
    *   summary="Creates a new field cash flow",
    *   description="Creates a new field cash flow",
    *   tags={"FieldCashFlow"},
    *   security={{"passport": {"*"}}},
    *   @OA\RequestBody(
    *       @OA\MediaType(
    *           mediaType="application/json",
    *           @OA\Schema(ref="#/components/schemas/FieldCashFlow")
    *       )
    *   ),
    *   @OA\Response(
    *       @OA\MediaType(mediaType="application/json"),
    *       response=200,
    *       description="The Provider resource created",
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
    public function store(StoreFieldCashFlowRequest $request)
    {

        $field_cash_flow = new FieldCashFlow();
        $field_cash_flow->amount = $request->amount;
        $field_cash_flow->concept_id = $request->concept_id;
        $field_cash_flow->description = $request->description;
        $field_cash_flow->field_id = $request->field_id;
        $field_cash_flow->transaction_id = $request->transaction_id;
        //$field_cash_flow->balance = $request->balance;
        $field_cash_flow->beneficiary_id = $request->beneficiary_id;
        $field_cash_flow->user_created_id = $request->user_created_id;
        $field_cash_flow->save();

        return ( new FieldCashFlowResource($field_cash_flow))->additional(
            [
                'message:' => 'successfully registered data'
            ],201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FieldCashFlow  $fieldCashFlow
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *      path="/field-cash-flows/{id}",
     *      operationId="getfieldCashFlowById",
     *      tags={"FieldCashFlow"},
     *      summary="Get active information",
     *      description="Returns  data",
     *   @OA\Parameter(
     *          name="id",
     *          description="fiel cash flow id",
     *          required=true,
     *          in="path",
     *             @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/FieldCashFlow")
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
    public function show(FieldCashFlow $fieldCashFlow)
    {
        return(new FieldCashFlowResource($fieldCashFlow))->additional(
            [
                'message:' => 'succesfully response'
            ],200
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFieldCashFlowRequest  $request
     * @param  \App\Models\FieldCashFlow  $fieldCashFlow
     * @return \Illuminate\Http\Response
     *
     * @OA\Put(
     *      path="/field-cash-flows/{id}",
     *      operationId="updatefieldCashFlow",
     *      tags={"FieldCashFlow"},
     *      summary="Update existing data",
     *      description="Returns updated  data",
     *  @OA\Parameter(
     *      name="id",
     *      description="field cash flow id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/FieldCashFlow")
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/FieldCashFlow")
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
    public function update(UpdateFieldCashFlowRequest $request, FieldCashFlow $field_cash_flow)
    {
        $field_cash_flow->amount = $request->amount;
        $field_cash_flow->concept_id = $request->concept_id;
        $field_cash_flow->status = $request->status;
        $field_cash_flow->transaction_id = $request->transaction_id;
        $field_cash_flow->description = $request->description;
        $field_cash_flow->field_id = $request->field_id;
        $field_cash_flow->balance = $request->balance;
        $field_cash_flow->beneficiary_id = $request->beneficiary_id;
        $field_cash_flow->user_created_id = $request->user_created_id;
        $field_cash_flow->update();

        return ( new FieldCashFlowResource($field_cash_flow))->additional(
            [
                'message:' => 'successfully updated data'
            ],200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FieldCashFlow  $fieldCashFlow
     * @return \Illuminate\Http\Response
     *
     * @OA\Delete(
     *  path="/field-cash-flows/{id}",
     *  operationId="deletefieldCashFlows",
     *  tags={"FieldCashFlow"},
     *  summary="Delete existing data",
     *  description="Deletes a record and returns no content",
     *  @OA\Parameter(
     *      name="id",
     *      description="field cash flow id",
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
    public function destroy(FieldCashFlow $fieldCashFlow)
    {
        $fieldCashFlow->delete();
        return response()->json(
            [
                'message' => 'the data was deleted successfully'
            ],200
        );
    }
}
