<?php

namespace App\Http\Controllers;

use App\Models\VehicleType;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
   /**
        * @OA\Get(
        *     path="/api/vehicle-types",
        *     summary="Show vehicle types",
        *     tags={"VehicleType"},
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
        *           description="The unique identifier of a Vehicle Type resource"
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
        *           description="The unique identifier of a Vehicle Type resource"
        *       )
        *    ),
        *   @OA\Parameter(
        *       name="dataSearch",
        *       in="query",
        *       description="Vehicle Type resource name",
        *       required=false,
        *       @OA\Schema(
        *           type="string",
        *           description="Search data"
        *       )
        *    ),
        *   @OA\Parameter(
        *       name="dataFilter",
        *       in="query",
        *       description="Vehicle Type resource name",
        *       required=false,
        *       @OA\Schema(
        *           type="string",
        *           description="The unique identifier of a Vehicle Type resource"
        *       )
        *    ),
        *     @OA\Response(
        *         response=200,
        *         description="Show Vehicle types all."
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
        $vehicletypes = VehicleType::filters($request->all())->search($request->all());
        return response()->json($vehicletypes, 200);
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
        *   path="/api/vehicle-types",
        *   summary="Creates a new vehicle Type",
        *   description="Creates a new vehicle Type",
        *   tags={"VehicleType"},
        *   security={{"passport": {"*"}}},
        *   @OA\RequestBody(
        *       @OA\MediaType(
        *           mediaType="application/json",
        *           @OA\Schema(ref="#/components/schemas/VehicleType")
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
        $vehicletype = new VehicleType();
        $vehicletype->name = $request->name;
        $vehicletype->acronym = $request->acronym;
        $vehicletype->user_created_id = $request->user_created_id;
        $vehicletype->save();
        return response()->json($vehicletype, 201);
    }
    /**
     * @OA\Get(
     *      path="/api/vehicle-types/{id}",
     *      operationId="vehicleTypeId",
     *      tags={"VehicleType"},
     *      summary="Get Vehicle Type information",
     *      description="Returns VehicleType data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Vehicle Type id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/VehicleType")
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
    public function show(VehicleType $vehicleType)
    {
        return response()->json($vehicleType, 200);
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
     *      path="/api/vehicle-types/{id}",
     *      operationId="vehicleTypeUpdateId",
     *      tags={"VehicleType"},
     *      summary="Update existing Vehicle Type",
     *      description="Returns updated VehicleType data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Vehicle Type id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/VehicleType")
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
    public function update(Request $request, VehicleType $vehicleType)
    {
        $vehicleType->name = $request->name;
        $vehicleType->acronym = $request->acronym;
        $vehicleType->user_updated_id = $request->user_updated_id;
        $vehicleType->update();
        return response()->json($vehicleType, 200);
    }
    /**
     * @OA\Delete(
     *      path="/api/vehicle-types/{id}",
     *      operationId="deleteProject",
     *      tags={"VehicleType"},
     *      summary="Delete existing VehicleType",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="VehicleType id",
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
    public function destroy(VehicleType $vehicleType)
    {
        $vehicleType->delete();
        return response()->json('succesfull delete', 200);
    }
}
