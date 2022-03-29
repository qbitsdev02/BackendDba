<?php

namespace App\Http\Controllers;

use App\Models\EgressType;
use App\Http\Requests\StoreEgressTypeRequest;
use App\Http\Requests\UpdateEgressTypeRequest;
use Illuminate\Http\Request;

class EgressTypeController extends Controller
{

    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      * @OA\Get(
      *     path="/egress-types",
      *     operationId="getEgresstype",
      *     tags={"EgressType"},
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
      *         description="Show Egresstypes all."
      *     ),
      *     @OA\Response(
      *         response="default",
      *         description="error."
      *     )
      *  )
      */
    public function index(Request $request)
    {
        $egressTypes = EgressType::filters($request->all())->search($request->all());
        return response()->json($egressTypes, 200);
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
      * @param  \App\Http\Requests\StoreEgressTypeRequest  $request
      * @return \Illuminate\Http\Response
      * @OA\Post(
      *   path="/egress-types",
      *   summary="Creates a new EgressType",
      *   description="Creates a new EgressType",
      *   tags={"EgressType"},
      *   security={{"passport": {"  *"}}},
      *   @OA\RequestBody(
      *       @OA\MediaType(
      *           mediaType="application/json",
      *           @OA\Schema(ref="#/components/schemas/EgressType")
      *       )
      *   ),
      *   @OA\Response(
      *       @OA\MediaType(mediaType="application/json"),
      *       response=200,
      *       description="The EgressType resource created",
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
    public function store(StoreEgressTypeRequest $request)
    {
        $egressType = new EgressType();
        $egressType->name = $request->name;
        $egressType->description = $request->description;
        $egressType->user_created_id = $request->user_created_id;
        $egressType->save();
        return response()->json($egressType, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EgressType  $egressType
     * @return \Illuminate\Http\Response
     * @OA\Get(
     *   path="/egress-types/{id}",
     *   operationId="getEgressTypeById",
     *   tags={"EgressType"},
     *   summary="Get EgressType information",
     *   description="Returns EgressType data",
     *   @OA\Parameter(
     *      name="id",
     *      description="EgressType id",
     *      required=true,
     *      in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/EgressType")
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
    public function show(EgressType $egressType)
    {
        return response($egressType, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EgressType  $egressType
     * @return \Illuminate\Http\Response
     */
    public function edit(EgressType $egressType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * @param  \App\Http\Requests\UpdateEgressTypeRequest  $request
     * @param  \App\Models\EgressType  $egressType
     * @return \Illuminate\Http\Response
     * @OA\Put(
     *  path="/egress-types/{id}",
     *  operationId="updateEgress",
     *  tags={"EgressType"},
     *  summary="Update existing Egresstype",
     *  description="Returns updated Egresstype data",
     *  @OA\Parameter(
     *      name="id",
     *      description="EgressType id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/EgressType")
     *   ),
     *   @OA\Response(
     *      response=202,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/EgressType")
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
    public function update(UpdateEgressTypeRequest $request, EgressType $egressType)
    {
        $egressType->name = $request->name;
        $egressType->description = $request->description;
        $egressType->user_created_id = $request->user_created_id;
        $egressType->update();
        return response()->json($egressType, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EgressType  $egressType
     * @return \Illuminate\Http\Response
     * @OA\Delete(
     *  path="/egress-types/{id}",
     *  operationId="deleteEgress",
     *  tags={"EgressType"},
     *  summary="Delete existing EgressType",
     *  description="Deletes a record and returns no content",
     *  @OA\Parameter(
     *      name="id",
     *      description="EgressType id",
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
    public function destroy(EgressType $egressType)
    {
        $egressType->delete();
        return response('the data was deleted successfully', 200);
    }
}
