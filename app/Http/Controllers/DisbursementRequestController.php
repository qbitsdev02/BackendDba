<?php

namespace App\Http\Controllers;

use App\Models\DisbursementRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDisbursementRequestRequest;
use App\Http\Requests\UpdateDisbursementRequestRequest;
use App\Http\Resources\DisbursementRequestResource;
use Illuminate\Http\Request;

class DisbursementRequestController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(DisbursementRequest::class, 'disbursement_request');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/disbursement-requests",
     *     operationId="getdisbursementRequest",
     *     tags={"DisbursementRequest"},
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
     *         description="data all."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="error."
     *     )
     *  )
     */
    public function index(Request $request)
    {
        $disbursementRequests = DisbursementRequest::filters($request->all())
            ->search($request->all());

        return (DisbursementRequestResource::collection($disbursementRequests))->additional(
            [
                'message' => 'successfully response'
            ],
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDisbursementRequestRequest  $request
     * @return \Illuminate\Http\Response
     *
     * @OA\Post(
     *   path="/disbursement-requests",
     *   summary="Creates a new register",
     *   description="Creates a new register",
     *   tags={"DisbursementRequest"},
     *   security={{"passport": {"*"}}},
     *   @OA\RequestBody(
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/DisbursementRequest")
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
    public function store(StoreDisbursementRequestRequest $request)
    {
        $disbursementRequest = new DisbursementRequest();
        $disbursementRequest->coin_id = $request->coin_id;
        $disbursementRequest->request_branch_office_id = $request->request_branch_office_id;
        $disbursementRequest->amount = $request->amount;
        $disbursementRequest->user_created_id = $request->user_created_id;
        $disbursementRequest->save();

        return (new DisbursementRequestResource($disbursementRequest))->additional(
            [
                'message:' => 'successfully registered data'
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DisbursementRequest  $disbursementRequest
     * @return \Illuminate\Http\Response
     * 
     * @OA\Get(
     *      path="/disbursement-requests/{id}",
     *      operationId="getdisbursementRequestById",
     *      tags={"DisbursementRequest"},
     *      summary="Get register information",
     *      description="Returns Port data",
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
     *          @OA\JsonContent(ref="#/components/schemas/DisbursementRequest")
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
    public function show(DisbursementRequest $disbursementRequest)
    {
        return (new DisbursementRequestResource($disbursementRequest))->additional(
            [
                'message:' => 'Successfully response'
            ],
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDisbursementRequestRequest  $request
     * @param  \App\Models\DisbursementRequest  $disbursementRequest
     * @return \Illuminate\Http\Response
     * 
     *  @OA\Put(
     *      path="/disbursement-requests/{id}",
     *      operationId="updatedisbursementRequest",
     *      tags={"DisbursementRequest"},
     *      summary="Update existing register",
     *      description="Returns updated port data",
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
     *      @OA\JsonContent(ref="#/components/schemas/DisbursementRequest")
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/DisbursementRequest")
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
    public function update(UpdateDisbursementRequestRequest $request, DisbursementRequest $disbursementRequest)
    {
        $disbursementRequest->coin_id = $request->coin_id;
        $disbursementRequest->request_branch_office_id = $request->request_branch_office_id;
        $disbursementRequest->amount = $request->amount;
        $disbursementRequest->user_created_id = $request->user_created_id;
        $disbursementRequest->update();

        return (new DisbursementRequestResource($disbursementRequest))->additional(
            [
                'message:' => 'successfully registered data'
            ],
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DisbursementRequest  $disbursementRequest
     * @return \Illuminate\Http\Response
     * 
     *  @OA\Delete(
     *  path="/disbursement-requests/{id}",
     *  operationId="deletedisbursementRequest",
     *  tags={"DisbursementRequest"},
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
    public function destroy(DisbursementRequest $disbursementRequest)
    {
        $disbursementRequest->delete();
        return response()->json(
            [
                'message' => 'the data was deleted successfully'
            ],
            200
        );
    }
}
