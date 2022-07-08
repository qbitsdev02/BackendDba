<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProviderTypeRequest;
use App\Http\Requests\UpdateProviderTypeRequest;
use App\Http\Resources\ProviderTypeResource;
use App\Models\ProviderType;
use Illuminate\Http\Request;

class ProviderTypeController extends Controller
{

    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(ProviderType::class, 'providerType');
    }


    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      * @OA\Get(
      *     path="/provider-types",
      *     operationId="getProvider-type",
      *     tags={"ProviderType"},
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
      *         description="Show MaterialSupplierTypes all."
      *     ),
      *     @OA\Response(
      *         response="default",
      *         description="error."
      *     )
      *  )
      */
    public function index(Request $request)
    {
        $providerTypes = ProviderType::filters($request->all())
            ->search($request->all());
            
        return (ProviderTypeResource::collection($providerTypes))
            ->additional(['message:' => 'successfully response.']);
    }

    /**
      * Store a newly created resource in storage.
      *
      * @param  \App\Http\Requests\StoreProviderType  $request
      * @return \Illuminate\Http\Response
      * 
      *   @OA\Post(
      *   path="/provider-types",
      *   summary="Creates a new ProviderType",
      *   description="Creates a new ProviderType",
      *   tags={"ProviderType"},
      *   security={{"passport": {"*"}}},
      *   @OA\RequestBody(
      *       @OA\MediaType(
      *           mediaType="application/json",
      *           @OA\Schema(ref="#/components/schemas/ProviderType")
      *       )
      *   ),
      *   @OA\Response(
      *       @OA\MediaType(mediaType="application/json"),
      *       response=200,
      *       description="The ProviderType resource created",
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
    public function store(StoreProviderTypeRequest $request)
    {
        $providerType = new ProviderType();
        $providerType->name = $request->name;
        $providerType->description = $request->description;
        $providerType->user_created_id = $request->user_created_id;
      
        $providerType->save();

        return  (new ProviderTypeResource($providerType))
            ->additional(['message:' => 'successfully registered provider type.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProviderTyper ProviderType
     * @return \Illuminate\Http\Response
     * @OA\Get(
     *   path="/provider-types/{id}",
     *   operationId="getProviderTypeById",
     *   tags={"ProviderType"},
     *   summary="Get ProviderType information",
     *   description="Returns ProviderTypee data",
     *   @OA\Parameter(
     *      name="id",
     *      description="ProviderType id",
     *      required=true,
     *      in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/ProviderType")
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
    public function show(ProviderType $providerType)
    {
        return (new ProviderTypeResource($providerType))
            ->additional(['message:' => 'successfully response.']);
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * @param  \App\Http\Requests\UpdateProviderTypeRequest  $request
     * @param  \App\Models\ProviderType  $providerType
     * @return \Illuminate\Http\Response
     * @OA\Put(
     *  path="/provider-types/{id}",
     *  operationId="updateProvierType",
     *  tags={"ProviderType"},
     *  summary="Update existing ProviderType",
     *  description="Returns updated Provider Type data",
     *  @OA\Parameter(
     *      name="id",
     *      description="Provider_type _id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/ProviderType")
     *   ),
     *   @OA\Response(
     *      response=202,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/ProviderType")
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
    public function update(UpdateProviderTypeRequest $request, ProviderType $providerType)
    {
        $providerType->name = $request->name;
        $providerType->description = $request->description;
        $providerType->user_created_id = $request->user_created_id;

        $providerType->update();

        return  response((new ProviderTypeResource($providerType))
            ->additional(['message:' => 'successfully updated provider.']),200);
    }

    /**
     *  @OA\Delete(
     *      path="/provider-types/{id}",
     *      operationId="deleteProviderType",
     *      tags={"ProviderType"},
     *      summary="Delete existing ProviderType",
     *       description="Deletes a record and returns no content",
     *  @OA\Parameter(
     *      name="id",
     *      description="ProviderType id",
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
    public function destroy(ProviderType $providerType)
    {
        $providerType->delete();
        return response()->json(
            [
                'message' => 'the data was deleted successfully'
            ],200
        );
    }
}
