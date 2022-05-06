<?php

namespace App\Http\Controllers;

use App\Helpers\RoleAcronym;
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
      *     path="/material-suppliers",
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
        $material-suppliers = MaterialSupplier::ofType(RoleAcronym::BNFCR)
            ->filters($request->all())
            ->search($request->all());

        return response()->json($material-suppliers, 200);
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
      *   path="/material-suppliers",
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
        $beneficiary = new MaterialSupplier();
        $beneficiary->name = $request->name;
        $beneficiary->document_number = $request->document_number;
        $beneficiary->address = $request->address;
        $beneficiary->email = $request->email;
        $beneficiary->phone_number = $request->phone_number;
        $beneficiary->user_created_id = $request->user_created_id;
        $beneficiary->save();
        return response()->json($beneficiary, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MaterialSupplier  $beneficiary
     * @return \Illuminate\Http\Response
     * @OA\Get(
     *   path="/material-suppliers/{id}",
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
    public function show(MaterialSupplier $beneficiary)
    {
        return response($beneficiary, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MaterialSupplier  $beneficiary
     * @return \Illuminate\Http\Response
     */
    public function edit(MaterialSupplier $beneficiary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * @param  \App\Http\Requests\UpdateMaterialSupplierRequest  $request
     * @param  \App\Models\MaterialSupplier  $beneficiary
     * @return \Illuminate\Http\Response
     * @OA\Put(
     *  path="/material-suppliers/{id}",
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
    public function update(UpdateMaterialSupplierRequest $request, MaterialSupplier $beneficiary)
    {
        $beneficiary->name = $request->name;
        $beneficiary->address = $request->address;
        $beneficiary->document_number = $request->document_number;
        $beneficiary->email = $request->email;
        $beneficiary->phone_number = $request->phone_number;
        $beneficiary->user_updated_id = $request->user_updated_id;
        $beneficiary->update();
        return response()->json($beneficiary, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MaterialSupplier  $beneficiary
     * @return \Illuminate\Http\Response
     * @OA\Delete(
     *  path="/material-suppliers/{id}",
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
    public function destroy(MaterialSupplier $beneficiary)
    {
        $beneficiary->delete();
        return response('the data was deleted successfully', 200);
    }
}
