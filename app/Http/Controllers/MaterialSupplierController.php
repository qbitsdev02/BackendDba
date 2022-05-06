<?php

namespace App\Http\Controllers;

use App\Models\MaterialSupplier;
use App\Http\Requests\StoreMaterialSupplierRequest;
use App\Http\Requests\UpdateMaterialSupplierRequest;
use Illuminate\Http\Request;

class MaterialSupplierController extends Controller
{

    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      * @OA\Get(
      *     path="/materialSuppliers",
      *     operationId="getMaterialSupplier",
      *     tags={"MaterialSupplier"},
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
      *         description="Show MaterialSuppliers all."
      *     ),
      *     @OA\Response(
      *         response="default",
      *         description="error."
      *     )
      *  )
      */
    public function index(Request $request)
    {
        $materialSuppliers = MaterialSupplier::filters($request->all())
            ->search($request->all());

        return response()->json($materialSuppliers, 200);
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
      * @param  \App\Http\Requests\StoreMaterialSupplierRequest  $request
      * @return \Illuminate\Http\Response
      * @OA\Post(
      *   path="/materialSuppliers",
      *   summary="Creates a new MaterialSupplier",
      *   description="Creates a new MaterialSupplier",
      *   tags={"MaterialSupplier"},
      *   security={{"passport": {"*"}}},
      *   @OA\RequestBody(
      *       @OA\MediaType(
      *           mediaType="application/json",
      *           @OA\Schema(ref="#/components/schemas/MaterialSupplier")
      *       )
      *   ),
      *   @OA\Response(
      *       @OA\MediaType(mediaType="application/json"),
      *       response=200,
      *       description="The MaterialSupplier resource created",
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
    public function store(StoreMaterialSupplierRequest $request)
    {
        $materialSupplier = new MaterialSupplier();
        $materialSupplier->name = $request->name;
        $materialSupplier->seal = $request->seal;
        $materialSupplier->logo = $request->logo;
        $materialSupplier->serie_number = $request->serie_number;
        $materialSupplier->signature = $request->signature;
        $materialSupplier->document_number = $request->document_number;
        $materialSupplier->address = $request->address;
        $materialSupplier->email = $request->email;
        $materialSupplier->phone_number = $request->phone_number;
        $materialSupplier->user_created_id = $request->user_created_id;
        $materialSupplier->save();
        return response()->json($materialSupplier, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MaterialSupplier  $materialSupplier
     * @return \Illuminate\Http\Response
     * @OA\Get(
     *   path="/materialSuppliers/{id}",
     *   operationId="getMaterialSupplierById",
     *   tags={"MaterialSupplier"},
     *   summary="Get MaterialSupplier information",
     *   description="Returns MaterialSupplier data",
     *   @OA\Parameter(
     *      name="id",
     *      description="MaterialSupplier id",
     *      required=true,
     *      in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/MaterialSupplier")
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
    public function show(MaterialSupplier $materialSupplier)
    {
        return response($materialSupplier, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MaterialSupplier  $materialSupplier
     * @return \Illuminate\Http\Response
     */
    public function edit(MaterialSupplier $materialSupplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * @param  \App\Http\Requests\UpdateMaterialSupplierRequest  $request
     * @param  \App\Models\MaterialSupplier  $materialSupplier
     * @return \Illuminate\Http\Response
     * @OA\Put(
     *  path="/materialSuppliers/{id}",
     *  operationId="updateMaterialSupplier",
     *  tags={"MaterialSupplier"},
     *  summary="Update existing MaterialSupplier",
     *  description="Returns updated MaterialSupplier data",
     *  @OA\Parameter(
     *      name="id",
     *      description="MaterialSupplier id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/MaterialSupplier")
     *   ),
     *   @OA\Response(
     *      response=202,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/MaterialSupplier")
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
    public function update(UpdateMaterialSupplierRequest $request, MaterialSupplier $materialSupplier)
    {
        $materialSupplier->name = $request->name;
        $materialSupplier->seal = $request->seal;
        $materialSupplier->signature = $request->signature;
        $materialSupplier->address = $request->address;
        $materialSupplier->logo = $request->logo;
        $materialSupplier->document_number = $request->document_number;
        $materialSupplier->email = $request->email;
        $materialSupplier->serie_number = $request->serie_number;
        $materialSupplier->phone_number = $request->phone_number;
        $materialSupplier->user_updated_id = $request->user_updated_id;
        $materialSupplier->update();
        return response()->json($materialSupplier, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MaterialSupplier  $materialSupplier
     * @return \Illuminate\Http\Response
     * @OA\Delete(
     *  path="/materialSuppliers/{id}",
     *  operationId="deleteMaterialSupplier",
     *  tags={"MaterialSupplier"},
     *  summary="Delete existing MaterialSupplier",
     *  description="Deletes a record and returns no content",
     *  @OA\Parameter(
     *      name="id",
     *      description="MaterialSupplier id",
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
    public function destroy(MaterialSupplier $materialSupplier)
    {
        $materialSupplier->delete();
        return response('the data was deleted successfully', 200);
    }
}
