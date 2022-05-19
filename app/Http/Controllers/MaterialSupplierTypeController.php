<?php

namespace App\Http\Controllers;

use App\Models\MaterialSupplierType;
use App\Http\Requests\StoreMaterialSupplierTypeRequest;
use App\Http\Requests\UpdateMaterialSupplierTypeRequest;
use Illuminate\Http\Request;

class MaterialSupplierTypeController extends Controller
{

    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      * @OA\Get(
      *     path="/material-supplier-types",
      *     operationId="getMaterialSupplierType",
      *     tags={"MaterialSupplierType"},
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
        $materialSupplierTypes = MaterialSupplierType::filters($request->all())->search($request->all());
        return response()->json($materialSupplierTypes, 200);
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
      * @param  \App\Http\Requests\StoreMaterialSupplierTypeRequest  $request
      * @return \Illuminate\Http\Response
      * @OA\Post(
      *   path="/material-supplier-types",
      *   summary="Creates a new MaterialSupplierType",
      *   description="Creates a new MaterialSupplierType",
      *   tags={"MaterialSupplierType"},
      *   security={{"passport": {"*"}}},
      *   @OA\RequestBody(
      *       @OA\MediaType(
      *           mediaType="application/json",
      *           @OA\Schema(ref="#/components/schemas/MaterialSupplierType")
      *       )
      *   ),
      *   @OA\Response(
      *       @OA\MediaType(mediaType="application/json"),
      *       response=200,
      *       description="The MaterialSupplierType resource created",
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
    public function store(StoreMaterialSupplierTypeRequest $request)
    {
        $materialSupplierType = new MaterialSupplierType();
        $materialSupplierType->name = $request->name;
        $materialSupplierType->description = $request->description;
        $materialSupplierType->user_created_id = $request->user_created_id;
        $materialSupplierType->save();
        return response()->json($materialSupplierType, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MaterialSupplierType  $materialSupplierType
     * @return \Illuminate\Http\Response
     * @OA\Get(
     *   path="/material-supplier-types/{id}",
     *   operationId="getMaterialSupplierTypeById",
     *   tags={"MaterialSupplierType"},
     *   summary="Get MaterialSupplierType information",
     *   description="Returns MaterialSupplierType data",
     *   @OA\Parameter(
     *      name="id",
     *      description="MaterialSupplierType id",
     *      required=true,
     *      in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/MaterialSupplierType")
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
    public function show(MaterialSupplierType $materialSupplierType)
    {
        return response($materialSupplierType, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MaterialSupplierType  $materialSupplierType
     * @return \Illuminate\Http\Response
     */
    public function edit(MaterialSupplierType $materialSupplierType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * @param  \App\Http\Requests\UpdateMaterialSupplierTypeRequest  $request
     * @param  \App\Models\MaterialSupplierType  $materialSupplierType
     * @return \Illuminate\Http\Response
     * @OA\Put(
     *  path="/material-supplier-types/{id}",
     *  operationId="updateMaterialSupplierType",
     *  tags={"MaterialSupplierType"},
     *  summary="Update existing MaterialSupplierType",
     *  description="Returns updated MaterialSupplierType data",
     *  @OA\Parameter(
     *      name="id",
     *      description="MaterialSupplierType id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/MaterialSupplierType")
     *   ),
     *   @OA\Response(
     *      response=202,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/MaterialSupplierType")
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
    public function update(UpdateMaterialSupplierTypeRequest $request, MaterialSupplierType $materialSupplierType)
    {
        $materialSupplierType->name = $request->name;
        $materialSupplierType->description = $request->description;
        $materialSupplierType->user_created_id = $request->user_created_id;
        $materialSupplierType->update();
        return response()->json($materialSupplierType, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MaterialSupplierType  $materialSupplierType
     * @return \Illuminate\Http\Response
     * @OA\Delete(
     *  path="/material-supplier-types/{id}",
     *  operationId="deleteMaterialSupplierType",
     *  tags={"MaterialSupplierType"},
     *  summary="Delete existing MaterialSupplierType",
     *  description="Deletes a record and returns no content",
     *  @OA\Parameter(
     *      name="id",
     *      description="MaterialSupplierType id",
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
    public function destroy(MaterialSupplierType $materialSupplierType)
    {
        $materialSupplierType->delete();
        return response('the data was deleted successfully', 200);
    }
}
