<?php

namespace App\Http\Controllers;

use App\Models\AttributeType;
use Illuminate\Http\Request;

class AttributeTypeController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/attribute-types",
     *     summary="Show attribute types",
     *     tags={"AttributeType"},
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
     *       name="sortField",
     *       in="query",
     *       description="AttributeType resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="id",
     *           description="The unique identifier of a AttributeType resource"
     *       )
     *     ),
     *     @OA\Parameter(
     *       name="sortOrder",
     *       in="query",
     *       description="AttributeType resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="desc",
     *           description="The unique identifier of a AttributeType resource"
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
     *           description="The unique identifier of a AttributeType resource"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataSearch",
     *       in="query",
     *       description="AttributeType resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="Search data"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataFilter",
     *       in="query",
     *       description="AttributeType resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="The unique identifier of a AttributeType resource"
     *       )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Show attribute types all."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="error."
     *     )
     *  )
    */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $attributeTypes = AttributeType::filters($request->all())->search($request->all());
        return response()->json($attributeTypes, 200);
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
        * @OA\Post(
        *   path="/api/attribute-types",
        *   summary="Creates a new attribute types",
        *   description="Creates a new attribute types",
        *   tags={"AttributeType"},
        *   security={{"passport": {"*"}}},
        *   @OA\RequestBody(
        *       @OA\MediaType(
        *           mediaType="application/json",
        *           @OA\Schema(ref="#/components/schemas/AttributeType")
        *       )
        *   ),
        *   @OA\Response(
        *       @OA\MediaType(mediaType="application/json"),
        *       response=200,
        *       description="The AttributeType resource created",
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
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributeType = new AttributeType();
        $attributeType->name = $request->name;
        $attributeType->description = $request->description;
        $attributeType->user_created_id = $request->user_created_id;
        $attributeType->save();
        return response()->json($attributeType, 201);
    }
    /**
     * @OA\Get(
     *      path="/api/attribute-types/{id}",
     *      operationId="getAttributeTypeById",
     *      tags={"AttributeType"},
     *      summary="Get AttributeType information",
     *      description="Returns AttributeType data",
     *      @OA\Parameter(
     *          name="id",
     *          description="AttributeType id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/AttributeType")
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
     * )
     */
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AttributeType  $attributeType
     * @return \Illuminate\Http\Response
     */
    public function show(AttributeType $attributeType)
    {
        return response()->json($attributeType, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AttributeType  $attributeType
     * @return \Illuminate\Http\Response
     */
    public function edit(AttributeType $attributeType)
    {
        //
    }
    /**
     * @OA\Put(
     *      path="/api/attribute-types/{id}",
     *      operationId="updateAttributeType",
     *      tags={"AttributeType"},
     *      summary="Update existing AttributeType",
     *      description="Returns updated AttributeType data",
     *      @OA\Parameter(
     *          name="id",
     *          description="AttributeType id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/AttributeType")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/AttributeType")
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
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AttributeType  $attributeType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttributeType $attributeType)
    {
        $attributeType->name = $request->name;
        $attributeType->description = $request->description;
        $attributeType->user_updated_id = $request->user_updated_id;
        $attributeType->update();
        return response()->json($attributeType, 200);
    }
    /**
     * @OA\Delete(
     *      path="/api/attribute-types/{id}",
     *      operationId="deleteProject",
     *      tags={"AttributeType"},
     *      summary="Delete existing AttributeType",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="AttributeType id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttributeType  $attributeType
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttributeType $attributeType)
    {
        $attributeType->delete();
        return response()->json('succesfull delete', 200);
    }
}
