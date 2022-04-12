<?php

namespace App\Http\Controllers;

use App\Models\ConceptType;
use App\Http\Requests\StoreConceptTypeRequest;
use App\Http\Requests\UpdateConceptTypeRequest;
use Illuminate\Http\Request;

class ConceptTypeController extends Controller
{

    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      * @OA\Get(
      *     path="/concept-types",
      *     operationId="getConceptType",
      *     tags={"ConceptType"},
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
      *         description="Show ConceptTypes all."
      *     ),
      *     @OA\Response(
      *         response="default",
      *         description="error."
      *     )
      *  )
      */
    public function index(Request $request)
    {
        $conceptTypeTypes = ConceptType::filters($request->all())->search($request->all());
        return response()->json($conceptTypeTypes, 200);
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
      * @param  \App\Http\Requests\StoreConceptTypeRequest  $request
      * @return \Illuminate\Http\Response
      * @OA\Post(
      *   path="/concept-types",
      *   summary="Creates a new ConceptType",
      *   description="Creates a new ConceptType",
      *   tags={"ConceptType"},
      *   security={{"passport": {"  *"}}},
      *   @OA\RequestBody(
      *       @OA\MediaType(
      *           mediaType="application/json",
      *           @OA\Schema(ref="#/components/schemas/ConceptType")
      *       )
      *   ),
      *   @OA\Response(
      *       @OA\MediaType(mediaType="application/json"),
      *       response=200,
      *       description="The ConceptType resource created",
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
    public function store(StoreConceptTypeRequest $request)
    {
        $conceptType = new ConceptType();
        $conceptType->name = $request->name;
        $conceptType->sign = $request->sign;
        $conceptType->description = $request->description;
        $conceptType->user_created_id = $request->user_created_id;
        $conceptType->save();
        return response()->json($conceptType, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConceptType  $conceptType
     * @return \Illuminate\Http\Response
     * @OA\Get(
     *   path="/concept-types/{id}",
     *   operationId="getConceptTypeById",
     *   tags={"ConceptType"},
     *   summary="Get ConceptType information",
     *   description="Returns ConceptType data",
     *   @OA\Parameter(
     *      name="id",
     *      description="ConceptType id",
     *      required=true,
     *      in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/ConceptType")
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
    public function show(ConceptType $conceptType)
    {
        return response($conceptType, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConceptType  $conceptType
     * @return \Illuminate\Http\Response
     */
    public function edit(ConceptType $conceptType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * @param  \App\Http\Requests\UpdateConceptTypeRequest  $request
     * @param  \App\Models\ConceptType  $conceptType
     * @return \Illuminate\Http\Response
     * @OA\Put(
     *  path="/concept-types/{id}",
     *  operationId="updateEgress",
     *  tags={"ConceptType"},
     *  summary="Update existing ConceptType",
     *  description="Returns updated ConceptType data",
     *  @OA\Parameter(
     *      name="id",
     *      description="ConceptType id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/ConceptType")
     *   ),
     *   @OA\Response(
     *      response=202,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/ConceptType")
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
    public function update(UpdateConceptTypeRequest $request, ConceptType $conceptType)
    {
        $conceptType->name = $request->name;
        $conceptType->description = $request->description;
        $conceptType->sign = $request->sign;
        $conceptType->user_created_id = $request->user_created_id;
        $conceptType->update();
        return response()->json($conceptType, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConceptType  $conceptType
     * @return \Illuminate\Http\Response
     * @OA\Delete(
     *  path="/concept-types/{id}",
     *  operationId="deleteEgress",
     *  tags={"ConceptType"},
     *  summary="Delete existing ConceptType",
     *  description="Deletes a record and returns no content",
     *  @OA\Parameter(
     *      name="id",
     *      description="ConceptType id",
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
    public function destroy(ConceptType $conceptType)
    {
        $conceptType->delete();
        return response('the data was deleted successfully', 200);
    }
}
