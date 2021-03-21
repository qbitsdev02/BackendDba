<?php

namespace App\Http\Controllers;

use App\Models\VehicleBrand;
use Illuminate\Http\Request;

class VehicleBrandController extends Controller
{
    /**
        * @OA\Get(
        *     path="/api/vehicle-brands",
        *     summary="Show vehicle brands",
        *     tags={"VehicleBrand"},
        *   @OA\Parameter(
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
        *   ),
        *   @OA\Parameter(
        *       name="sortField",
        *       in="query",
        *       description="turno resource name",
        *       required=false,
        *       @OA\Schema(
        *           type="string",
        *           example="id",
        *           description="The unique identifier of a turno resource"
        *       )
        *    ),
        *   @OA\Parameter(
        *       name="sortOrder",
        *       in="query",
        *       description="turno resource name",
        *       required=false,
        *       @OA\Schema(
        *           type="string",
        *           example="desc",
        *           description="The unique identifier of a Vehicle Brand resource"
        *       )
        *    ),
        *   @OA\Parameter(
        *       name="perPage",
        *       in="query",
        *       description="Sort order field",
        *       @OA\Schema(
        *           title="perPage",
        *           type="number",
        *           default="10",
        *           description="The unique identifier of a Vehicle Brand resource"
        *       )
        *    ),
        *   @OA\Parameter(
        *       name="dataSearch",
        *       in="query",
        *       description="Vehicle Brand resource name",
        *       required=false,
        *       @OA\Schema(
        *           type="string",
        *           description="Search data"
        *       )
        *    ),
        *   @OA\Parameter(
        *       name="dataFilter",
        *       in="query",
        *       description="Vehicle Brand resource name",
        *       required=false,
        *       @OA\Schema(
        *           type="string",
        *           description="The unique identifier of a Vehicle Brand resource"
        *       )
        *    ),
        *     @OA\Response(
        *         response=200,
        *         description="Show Vehicle Brands all."
        *     ),
        *     @OA\Response(
        *         response="default",
        *         description="error."
        *     )
        * )
        */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vehicleBrands = VehicleBrand::filters($request->all())->search($request->all());
        return response()->json($vehicleBrands, 200);
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
        *   path="/api/vehicle-brands",
        *   summary="Creates a new vehicle brand",
        *   description="Creates a new vehicle brand",
        *   tags={"VehicleBrand"},
        *   security={{"passport": {"*"}}},
        *   @OA\RequestBody(
        *       @OA\MediaType(
        *           mediaType="application/json",
        *           @OA\Schema(ref="#/components/schemas/VehicleBrand")
        *       )
        *   ),
        *   @OA\Response(
        *       @OA\MediaType(mediaType="application/json"),
        *       response=200,
        *       description="The Role resource created",
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
        *
        * Store a newly created resource in storage.
        *
        * @param \Illuminate\Http\Request $request
        *
        * @return \Illuminate\Http\Response
        */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehicleBrand = new VehicleBrand();
        $vehicleBrand->name = $request->name;
        $vehicleBrand->acronym = $request->acronym;
        $vehicleBrand->user_created_id = $request->user_created_id;
        $vehicleBrand->save();
        return response()->json($vehicleBrand, 201);
    }
    /**
     * @OA\Get(
     *      path="/api/vehicle-brands/{id}",
     *      operationId="getUserById",
     *      tags={"VehicleBrand"},
     *      summary="Get Vehicle Brand information",
     *      description="Returns VehicleBrand data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Vehicle Brand id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/VehicleBrand")
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleBrand $vehicleBrand)
    {
        return response()->json($vehicleBrand, 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * @OA\Put(
     *      path="/api/vehicle-brands/{id}",
     *      operationId="vehicleBrandId",
     *      tags={"VehicleBrand"},
     *      summary="Update existing Vehicle Brand",
     *      description="Returns updated VehicleBrand data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Vehicle Brand id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/VehicleBrand")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Role")
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VehicleBrand $vehicleBrand)
    {
        $vehicleBrand->name = $request->name;
        $vehicleBrand->acronym = $request->acronym;
        $vehicleBrand->user_updated_id = $request->user_updated_id;
        $vehicleBrand->update();
        return response()->json($vehicleBrand, 200);
    }
    /**
     * @OA\Delete(
     *      path="/api/vehicle-brands/{id}",
     *      operationId="deleteProject",
     *      tags={"VehicleBrand"},
     *      summary="Delete existing VehicleBrand",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="VehicleBrand id",
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleBrand $vehicleBrand)
    {
        $vehicleBrand->delete();
        return response()->json('succesfull delete', 200);
    }
}
