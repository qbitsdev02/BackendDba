<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Models\FieldCashFlow;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFieldCashFlowRequest;
use App\Http\Requests\UpdateFieldCashFlowRequest;
use App\Http\Resources\FieldCashFlowResource;
use App\Models\Field;
use Illuminate\Http\Request;

class FieldCashFlowController extends Controller
{
    protected $fieldCashFlowLast = null;

    /**
     *
     */
    public function __construct()
    {
        // $this->authorizeResource(FieldCashFlow::class,'fieldCashFlow');
        $this->getBalance(request()->field_id);
    }

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
            ->typeCash($request->egress)
            ->search($request->all());

            return (FieldCashFlowResource::collection($cash_flows))->additional(
                [
                    'message:' => 'succesfully response'
                ],200
            );
    }

    public function getBalance($fieldId)
    {
        $cashFlowsEgress = FieldCashFlow::selectRaw('SUM(amount) as amount')
            ->whereNull('transaction_id')
            ->where('status', 'approved')
            ->where('field_id', $fieldId)
            ->first();

        $cashFlowsEntry = FieldCashFlow::selectRaw('SUM(amount) as amount')
            ->whereNotNull('transaction_id')
            ->where('status', 'approved')
            ->where('field_id', $fieldId)
            ->first();

        $this->fieldCashFlowLast = [
            'egress' => $cashFlowsEgress->amount,
            'entry' => $cashFlowsEntry->amount,
            'balance' => $cashFlowsEntry->amount - $cashFlowsEgress->amount
        ];
    }

    public function changeStatus(Request $request)
    {
        collect($request->data)
            ->map(function($fieldCashFlowRequest) {
                $this->getBalance($fieldCashFlowRequest['field_id']);
                $balance = (isset($fieldCashFlowRequest['transaction_id']) &&
                    $fieldCashFlowRequest['transaction_id'])
                    ? $this->fieldCashFlowLast['balance'] + $fieldCashFlowRequest['amount'] :
                    $this->fieldCashFlowLast['balance'] - $fieldCashFlowRequest['amount'];


                $fieldCashFlow = FieldCashFlow::updateOrCreate(
                    [
                        'id' => isset($fieldCashFlowRequest['id']) ? $fieldCashFlowRequest['id'] : null
                    ],
                    [
                        'amount' => $fieldCashFlowRequest['amount'],
                        'concept_id' => $fieldCashFlowRequest['concept_id'],
                        'description' => $fieldCashFlowRequest['description'],
                        'field_id' => $fieldCashFlowRequest['field_id'],
                        'status' => 'approved',
                        'transaction_id' => isset($fieldCashFlowRequest['transaction_id']) ? $fieldCashFlowRequest['transaction_id'] : null,
                        'balance' => $balance,
                        'beneficiary_id' => $fieldCashFlowRequest['beneficiary_id'],
                        'user_created_id' => $fieldCashFlowRequest['user_created_id'],
                        'date' => $fieldCashFlowRequest['date']
                    ]
                );

                if (isset($fieldCashFlowRequest['images']) && $fieldCashFlowRequest['images'])
                {
                    $imgModel = collect($fieldCashFlowRequest['images'])
                        ->map(function($image)use ($fieldCashFlow) {
                            return [
                                'img' => ImageHelper::convertFormat($image['img'], 'field_cash_flows'),
                                'user_created_id' => $fieldCashFlow->user_created_id
                            ];
                        });
                    $fieldCashFlow->images()->createMany($imgModel);
                }
            });
        return response()->json([
            'message' => 'status updated success'
        ]);
    }


    public function balance(Request $request)
    {
        $cashFlowsEgress = FieldCashFlow::selectRaw('SUM(amount) as amount, transaction_id, status, balance')
            ->whereNull('transaction_id')
            ->where('field_id', $request->field_id)
            ->orderBy('transaction_id', 'desc');


        $cashFlows = FieldCashFlow::selectRaw('SUM(amount) as amount, transaction_id, status, balance')
            ->whereNotNull('transaction_id')
            ->where('field_id', $request->field_id)
            ->union($cashFlowsEgress)
            ->orderBy('status', 'asc')
            ->orderBy('transaction_id', 'desc')
            ->groupBy('status')
            ->get();
        $response = [
            'balance' => $this->fieldCashFlowLast['balance'],
            'accounts' => $cashFlows
        ];
        return response()->json($response, 200);
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
        info($this->fieldCashFlowLast);
        $fieldCashFlow = new FieldCashFlow();
        $fieldCashFlow->amount = $request->amount;
        $fieldCashFlow->concept_id = $request->concept_id;
        $fieldCashFlow->description = $request->description;
        $fieldCashFlow->field_id = $request->field_id;
        $fieldCashFlow->transaction_id = $request->transaction_id;
        $fieldCashFlow->balance = $this->fieldCashFlowLast['balance'] - $request->amount;
        $fieldCashFlow->beneficiary_id = $request->beneficiary_id;
        $fieldCashFlow->user_created_id = $request->user_created_id;
        $fieldCashFlow->date = $request->date;
        $fieldCashFlow->save();

        return (new FieldCashFlowResource($fieldCashFlow))->additional(
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
    public function update(UpdateFieldCashFlowRequest $request, FieldCashFlow $fieldCashFlow)
    {
        $fieldCashFlow->amount = $request->amount;
        $fieldCashFlow->concept_id = $request->concept_id;
        $fieldCashFlow->status = $request->status;
        $fieldCashFlow->transaction_id = $request->transaction_id;
        $fieldCashFlow->description = $request->description;
        $fieldCashFlow->field_id = $request->field_id;
        $fieldCashFlow->balance = $this->fieldCashFlowLast ? $fieldCashFlow->amount + $this->fieldCashFlowLast['balance'] : $fieldCashFlow->amount;
        $fieldCashFlow->beneficiary_id = $request->beneficiary_id;
        $fieldCashFlow->user_created_id = $request->user_created_id;
        $fieldCashFlow->date = $request->date;
        $fieldCashFlow->update();

        return ( new FieldCashFlowResource($fieldCashFlow))->additional(
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
