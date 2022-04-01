<?php

namespace App\Http\Controllers;

use App\Helpers\RoleAcronym;
use App\Models\Responsable;
use App\Http\Requests\StoreResponsableRequest;
use App\Http\Requests\UpdateResponsableRequest;
use Illuminate\Http\Request;

class ResponsableController extends Controller
{

    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      * @OA\Get(
      *     path="/responsables",
      *     operationId="getResponsable",
      *     tags={"Responsable"},
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
      *         description="Show Responsables all."
      *     ),
      *     @OA\Response(
      *         response="default",
      *         description="error."
      *     )
      *  )
      */
    public function index(Request $request)
    {
        $responsables = Responsable::ofType(RoleAcronym::RESPONSABLE)
            ->filters($request->all())
            ->search($request->all());

        return response()->json($responsables, 200);
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
      * @param  \App\Http\Requests\StoreResponsableRequest  $request
      * @return \Illuminate\Http\Response
      * @OA\Post(
      *   path="/responsables",
      *   summary="Creates a new Responsable",
      *   description="Creates a new Responsable",
      *   tags={"Responsable"},
      *   security={{"passport": {"*"}}},
      *   @OA\RequestBody(
      *       @OA\MediaType(
      *           mediaType="application/json",
      *           @OA\Schema(ref="#/components/schemas/Responsable")
      *       )
      *   ),
      *   @OA\Response(
      *       @OA\MediaType(mediaType="application/json"),
      *       response=200,
      *       description="The Responsable resource created",
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
    public function store(StoreResponsableRequest $request)
    {
        $responsable = new Responsable();
        $responsable->name = $request->name;
        $responsable->last_name = $request->last_name;
        $responsable->document_number = $request->document_number;
        $responsable->email = $request->email;
        $responsable->phone_number = $request->phone_number;
        $responsable->beneficiary_id = $request->beneficiary_id;
        $responsable->user_created_id = $request->user_created_id;
        $responsable->save();
        return response()->json($responsable, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Responsable  $responsable
     * @return \Illuminate\Http\Response
     * @OA\Get(
     *   path="/responsables/{id}",
     *   operationId="getResponsableById",
     *   tags={"Responsable"},
     *   summary="Get Responsable information",
     *   description="Returns Responsable data",
     *   @OA\Parameter(
     *      name="id",
     *      description="Responsable id",
     *      required=true,
     *      in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Responsable")
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
    public function show(Responsable $responsable)
    {
        return response($responsable, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function edit(Responsable $responsable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * @param  \App\Http\Requests\UpdateResponsableRequest  $request
     * @param  \App\Models\Responsable  $responsable
     * @return \Illuminate\Http\Response
     * @OA\Put(
     *  path="/responsables/{id}",
     *  operationId="updateResponsable",
     *  tags={"Responsable"},
     *  summary="Update existing Responsable",
     *  description="Returns updated Responsable data",
     *  @OA\Parameter(
     *      name="id",
     *      description="Responsable id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Responsable")
     *   ),
     *   @OA\Response(
     *      response=202,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/Responsable")
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
    public function update(UpdateResponsableRequest $request, Responsable $responsable)
    {
        $responsable->name = $request->name;
        $responsable->last_name = $request->last_name;
        $responsable->document_number = $request->document_number;
        $responsable->email = $request->email;
        $responsable->beneficiary_id = $request->beneficiary_id;
        $responsable->phone_number = $request->phone_number;
        $responsable->user_updated_id = $request->user_updated_id;
        $responsable->update();
        return response()->json($responsable, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Responsable  $responsable
     * @return \Illuminate\Http\Response
     * @OA\Delete(
     *  path="/responsables/{id}",
     *  operationId="deleteResponsable",
     *  tags={"Responsable"},
     *  summary="Delete existing Responsable",
     *  description="Deletes a record and returns no content",
     *  @OA\Parameter(
     *      name="id",
     *      description="Responsable id",
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
    public function destroy(Responsable $responsable)
    {
        $responsable->delete();
        return response('the data was deleted successfully', 200);
    }
}
