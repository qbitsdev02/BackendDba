<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContractRequest;
use App\Http\Requests\UpdateContractRequest;
use App\Http\Resources\ContractResource;
use Illuminate\Http\Request;

class ContractController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Contract::class, 'contract');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/contracts",
     *     operationId="getcontract",
     *     tags={"Contract"},
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
     *         description="active all."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="error."
     *     )
     *  )
     */
    public function index(Request $request)
    {
        $contracts = Contract::filters($request->all())
            ->search($request->all());
        return (ContractResource::collection($contracts))->additional(
            [
                'message' => 'successfully response'
            ],
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContractRequest  $request
     * @return \Illuminate\Http\Response
     * 
     * @OA\Post(
     *   path="/contracts",
     *   summary="Creates a new contract",
     *   description="Creates a new contract",
     *   tags={"Contract"},
     *   security={{"passport": {"*"}}},
     *   @OA\RequestBody(
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/Contract")
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
    public function store(StoreContractRequest $request)
    {
        $contract = new Contract();
        $contract->name = $request->name;
        $contract->description = $request->description;
        $contract->organization_id = $request->organization_id;
        $contract->user_created_id = $request->user_created_id;
        $contract->save();

        return (new ContractResource($contract))->additional(
            [
                'message:' => 'successfully registered data'
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     * 
     * @OA\Get(
     *      path="/contracts/{id}",
     *      operationId="getcontractById",
     *      tags={"Contract"},
     *      summary="Get register information",
     *      description="Returns data",
     *   @OA\Parameter(
     *          name="id",
     *          description="Register id",
     *          required=true,
     *          in="path",
     *             @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Contract")
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
    public function show(Contract $contract)
    {
        return (new ContractResource($contract))->additional(
            [
                'message:' => 'successfully response'
            ],
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContractRequest  $request
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     * 
     *  @OA\Put(
     *      path="/contracts/{id}",
     *      operationId="updatecontract",
     *      tags={"Contract"},
     *      summary="Update existing register",
     *      description="Returns updated data",
     *  @OA\Parameter(
     *      name="id",
     *      description="Register id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Contract")
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/Contract")
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
    public function update(UpdateContractRequest $request, Contract $contract)
    {
        $contract->name = $request->name;
        $contract->description = $request->description;
        $contract->organization_id = $request->organization_id;
        $contract->user_created_id = $request->user_created_id;
        $contract->update();

        return (new ContractResource($contract))->additional(
            [
                'message:' => 'successfully updated data'
            ],
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     * 
     * @OA\Delete(
     *  path="/contracts/{id}",
     *  operationId="deletecontract",
     *  tags={"Contract"},
     *  summary="Delete existing register",
     *  description="Deletes a record and returns no content",
     *  @OA\Parameter(
     *      name="id",
     *      description="Register id",
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
    public function destroy(Contract $contract)
    {
        $contract->delete();
        return response()->json(
            [
                'message' => 'the data was deleted successfully'
            ],
            200
        );
    }
}
