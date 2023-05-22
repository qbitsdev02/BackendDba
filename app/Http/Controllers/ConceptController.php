<?php

namespace App\Http\Controllers;

use App\Models\Concept;
use App\Http\Requests\StoreConceptRequest;
use App\Http\Requests\UpdateConceptRequest;
use Illuminate\Http\Request;

class ConceptController extends Controller
{

    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      * @OA\Get(
      *     path="/concepts",
      *     operationId="getConcept",
      *     tags={"Concept"},
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
      *         description="Show Concepttypes all."
      *     ),
      *     @OA\Response(
      *         response="default",
      *         description="error."
      *     )
      *  )
      */
    public function index(Request $request)
    {
        $concepts = Concept::with('conceptType:id,name')->filters($request->all())->search($request->all());
        return response()->json($concepts, 200);
    }


    /**
      * Store a newly created resource in storage.
      *
      * @param  \App\Http\Requests\StoreConceptRequest  $request
      * @return \Illuminate\Http\Response
      * @OA\Post(
      *   path="/concepts",
      *   summary="Creates a new Concept",
      *   description="Creates a new Concept",
      *   tags={"Concept"},
      *   security={{"passport": {"  *"}}},
      *   @OA\RequestBody(
      *       @OA\MediaType(
      *           mediaType="application/json",
      *           @OA\Schema(ref="#/components/schemas/Concept")
      *       )
      *   ),
      *   @OA\Response(
      *       @OA\MediaType(mediaType="application/json"),
      *       response=200,
      *       description="The Concept resource created",
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
    public function store(StoreConceptRequest $request)
    {
        $concept = new Concept();
        $concept->name = $request->name;
        $concept->concept_id = $request->concept_id;
        $concept->description = $request->description;
        $concept->user_created_id = $request->user_created_id;
        $concept->save();
        return response()->json($concept, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Concept  $concept
     * @return \Illuminate\Http\Response
     * @OA\Get(
     *   path="/concepts/{id}",
     *   operationId="getConceptById",
     *   tags={"Concept"},
     *   summary="Get Concept information",
     *   description="Returns Concept data",
     *   @OA\Parameter(
     *      name="id",
     *      description="Concept id",
     *      required=true,
     *      in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Concept")
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
    public function show(Concept $concept)
    {
        return response($concept, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * @param  \App\Http\Requests\UpdateConceptRequest  $request
     * @param  \App\Models\Concept  $concept
     * @return \Illuminate\Http\Response
     * @OA\Put(
     *  path="/concepts/{id}",
     *  operationId="updateConcept",
     *  tags={"Concept"},
     *  summary="Update existing Concepttype",
     *  description="Returns updated Concepttype data",
     *  @OA\Parameter(
     *      name="id",
     *      description="Concept id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Concept")
     *   ),
     *   @OA\Response(
     *      response=202,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/Concept")
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
    public function update(UpdateConceptRequest $request, Concept $concept)
    {
        $concept->name = $request->name;
        $concept->description = $request->description;
        $concept->concept_id = $request->concept_id;
        $concept->user_created_id = $request->user_created_id;
        $concept->update();
        return response()->json($concept, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Concept  $concept
     * @return \Illuminate\Http\Response
     * @OA\Delete(
     *  path="/concepts/{id}",
     *  operationId="deleteConcept",
     *  tags={"Concept"},
     *  summary="Delete existing Concept",
     *  description="Deletes a record and returns no content",
     *  @OA\Parameter(
     *      name="id",
     *      description="Concept id",
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
    public function destroy(Concept $concept)
    {
        $concept->delete();
        return response('the data was deleted successfully', 200);
    }
}
