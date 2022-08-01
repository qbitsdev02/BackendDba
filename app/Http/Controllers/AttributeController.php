<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAttributeRequest;
use App\Http\Requests\UpdateAttributeRequest;
use App\Http\Resources\ActiveResource;
use App\Http\Resources\AttributeResource;
use App\Models\Active;
use Illuminate\Http\Request;

class AttributeController extends Controller
{

    /**
     * 
     */
    public function __construct()
    {
        $this->authorizeResource(Attribute::class, 'attribute');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
      * @OA\Get(
      *     path="/attributes",
      *     operationId="getattributes",
      *     tags={"Attribute"},
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
      *         description="attributes all."
      *     ),
      *     @OA\Response(
      *         response="default",
      *         description="error."
      *     )
      *  )
     */
    public function index(Request $request)
    {
        $attribute = Attribute::filters($request->all())
            ->search($request->all());
        
        return (AttributeResource::collection($attribute))->additional(
            [
                'message:' => 'Successfully response'
            ],200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAttributeRequest  $request
     * @return \Illuminate\Http\Response
     *
    * @OA\Post(
    *   path="/attributes",
    *   summary="Creates a new attributes",
    *   description="Creates a new attribute",
    *   tags={"Attribute"},
    *   security={{"passport": {"*"}}},
    *   @OA\RequestBody(
    *       @OA\MediaType(
    *           mediaType="application/json",
    *           @OA\Schema(ref="#/components/schemas/Attribute")
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
    public function store(StoreAttributeRequest $request)
    {
        $attribute = new Attribute();
        $attribute->name = $request->name;
        $attribute->description = $request->description;
        $attribute->user_created_id = $request->user_created_id;

        $attribute->save();
        return (new AttributeResource($attribute))->additional(
            [
                'message:' => 'successfully registered attribute'
            ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     * 
     * @OA\Get(
     *      path="/attributes/{id}",
     *      operationId="getattributeById",
     *      tags={"Attribute"},
     *      summary="Get attribute information",
     *      description="Returns attribute data",
     *   @OA\Parameter(
     *          name="id",
     *          description="attribute id",
     *          required=true,
     *          in="path",
     *             @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Attribute")
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
    public function show(Attribute $attribute)
    {
        return ( new AttributeResource($attribute))->additional(
            [
                'message:' => 'successfully response'
            ],201
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttributeRequest  $request
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     * 
     * @OA\Put(
     *      path="/attributes/{id}",
     *      operationId="updateattribute",
     *      tags={"Attribute"},
     *      summary="Update existing Attribute",
     *      description="Returns updated port data",
     *  @OA\Parameter(
     *      name="id",
     *      description="Attribute id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Attribute")
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/Attribute")
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
    public function update(UpdateAttributeRequest $request, Attribute $attribute)
    {
        $attribute->name = $request->name;
        $attribute->description = $request->description;
        $attribute->user_created_id = $request->user_created_id;

        $attribute->update();
        return (new AttributeResource($attribute))->additional(
            [
                'message:' => 'successfully updated attribute'
            ],200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     * 
     * @OA\Delete(
     *  path="/attributes/{id}",
     *  operationId="deleteattribute",
     *  tags={"Attribute"},
     *  summary="Delete existing attribute",
     *  description="Deletes a record and returns no content",
     *  @OA\Parameter(
     *      name="id",
     *      description="Attribute id",
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
    public function destroy(Attribute $attribute)
    {
        $attribute->delete();
        return response()->json(
            [
                'message' => 'the data was deleted successfully'
            ],200);
    }
}
