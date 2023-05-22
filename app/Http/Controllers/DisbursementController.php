<?php

namespace App\Http\Controllers;

use App\Models\Disbursement;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDisbursementRequest;
use App\Http\Requests\UpdateDisbursementRequest;
use App\Http\Resources\DisbursementResource;
use Illuminate\Http\Request;


class DisbursementController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Disbursement::class, 'disbursement');;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * @OA\Get(
     *     path="/disbursements",
     *     operationId="getdisburment",
     *     tags={"Disbursement"},
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
     *         description="all data"
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="error."
     *     )
     *  )
     */
    public function index(Request $request)
    {
        $disbursements = Disbursement::filters($request->all())
            ->search($request->all());
        return (DisbursementResource::collection($disbursements))->additional(
            [
                'message:' => 'successfully response'
            ],
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDisbursementRequest  $request
     * @return \Illuminate\Http\Response
     * 
     * @OA\Post(
     *   path="/disbursements",
     *   summary="Creates a new register",
     *   description="Creates a new register",
     *   tags={"Disbursement"},
     *   security={{"passport": {"*"}}},
     *   @OA\RequestBody(
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/Disbursement")
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
    public function store(StoreDisbursementRequest $request)
    {

        $disbursement = new Disbursement();
        $disbursement->from_branch_office_id = $request->from_branch_office_id;
        $disbursement->to_branch_office_id = $request->to_branch_office_id;
        $disbursement->amount = $request->amount;
        $disbursement->user_created_id = $request->user_created_id;
        $disbursement->save();

        return (new DisbursementResource($disbursement))->additional([
            'message' => 'successfully registered data'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disbursement  $disbursement
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *      path="/disbursements/{id}",
     *      operationId="getdisburmentById",
     *      tags={"Disbursement"},
     *      summary="Get data information",
     *      description="Returns register",
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
     *          @OA\JsonContent(ref="#/components/schemas/Disbursement")
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
    public function show(Disbursement $disbursement)
    {
        return (new DisbursementResource($disbursement))->additional(
            [
                'message' => 'successfully response'
            ],
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDisbursementRequest  $request
     * @param  \App\Models\Disbursement  $disbursement
     * @return \Illuminate\Http\Response
     * 
     * @OA\Put(
     *      path="/disbursements/{id}",
     *      operationId="updatedisbursement",
     *      tags={"Disbursement"},
     *      summary="Update existing Register",
     *      description="Returns updated  register",
     *  @OA\Parameter(
     *      name="id",
     *      description="register id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Disbursement")
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/Disbursement")
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
    public function update(UpdateDisbursementRequest $request, Disbursement $disbursement)
    {
        $disbursement->from_branch_office_id = $request->from_branch_office_id;
        $disbursement->to_branch_office_id = $request->to_branch_office_id;
        $disbursement->amount = $request->amount;
        $disbursement->user_created_id = $request->user_created_id;
        $disbursement->update();

        return (new DisbursementResource($disbursement))->additional([
            'message' => 'successfully updated register'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disbursement  $disbursement
     * @return \Illuminate\Http\Response
     * 
     * @OA\Delete(
     *  path="/disbursements/{id}",
     *  operationId="deletedisbursement",
     *  tags={"Disbursement"},
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
    public function destroy(Disbursement $disbursement)
    {
        $disbursement->delete();
        return response()->json([
            'message' => 'the data was deleted successfully'
        ], 200);
    }
}
