<?php

namespace App\Http\Controllers;

use App\Models\UnitOfMeasurement;
use App\Http\Requests\StoreUnitOfMeasurementRequest;
use App\Http\Requests\UpdateUnitOfMeasurementRequest;
use Illuminate\Http\Request;

class UnitOfMeasurementController extends Controller
{

    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      * @OA\Get(
      *     path="unit-of-measurements",
      *     operationId="getUnitOfMeasurement",
      *     tags={"UnitOfMeasurement"},
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
      *         description="Show UnitOfMeasurements all."
      *     ),
      *     @OA\Response(
      *         response="default",
      *         description="error."
      *     )
      *  )
      */
    public function index(Request $request)
    {
        $unitOfMeasurements = UnitOfMeasurement::filters($request->all())->search($request->all());
        return response()->json($unitOfMeasurements, 200);
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
      * @param  \App\Http\Requests\StoreUnitOfMeasurementRequest  $request
      * @return \Illuminate\Http\Response
      * @OA\Post(
      *   path="unit-of-measurements",
      *   summary="Creates a new UnitOfMeasurement",
      *   description="Creates a new UnitOfMeasurement",
      *   tags={"UnitOfMeasurement"},
      *   security={{"passport": {"*"}}},
      *   @OA\RequestBody(
      *       @OA\MediaType(
      *           mediaType="application/json",
      *           @OA\Schema(ref="#/components/schemas/UnitOfMeasurement")
      *       )
      *   ),
      *   @OA\Response(
      *       @OA\MediaType(mediaType="application/json"),
      *       response=200,
      *       description="The UnitOfMeasurement resource created",
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
    public function store(StoreUnitOfMeasurementRequest $request)
    {
        $unitOfMeasurement = new UnitOfMeasurement();
        $unitOfMeasurement->name = $request->name;
        $unitOfMeasurement->acronym = $request->acronym;
        $unitOfMeasurement->user_created_id = $request->user_created_id;
        $unitOfMeasurement->save();
        return response()->json($unitOfMeasurement, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnitOfMeasurement  $unitOfMeasurement
     * @return \Illuminate\Http\Response
     * @OA\Get(
     *   path="unit-of-measurements/{id}",
     *   operationId="getUnitOfMeasurementById",
     *   tags={"UnitOfMeasurement"},
     *   summary="Get UnitOfMeasurement information",
     *   description="Returns UnitOfMeasurement data",
     *   @OA\Parameter(
     *      name="id",
     *      description="UnitOfMeasurement id",
     *      required=true,
     *      in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/UnitOfMeasurement")
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
    public function show(UnitOfMeasurement $unitOfMeasurement)
    {
        return response($unitOfMeasurement, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnitOfMeasurement  $unitOfMeasurement
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitOfMeasurement $unitOfMeasurement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * @param  \App\Http\Requests\UpdateUnitOfMeasurementRequest  $request
     * @param  \App\Models\UnitOfMeasurement  $unitOfMeasurement
     * @return \Illuminate\Http\Response
     * @OA\Put(
     *  path="unit-of-measurements/{id}",
     *  operationId="updateUnitOfMeasurement",
     *  tags={"UnitOfMeasurement"},
     *  summary="Update existing UnitOfMeasurement",
     *  description="Returns updated UnitOfMeasurement data",
     *  @OA\Parameter(
     *      name="id",
     *      description="UnitOfMeasurement id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/UnitOfMeasurement")
     *   ),
     *   @OA\Response(
     *      response=202,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/UnitOfMeasurement")
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
    public function update(UpdateUnitOfMeasurementRequest $request, UnitOfMeasurement $unitOfMeasurement)
    {
        $unitOfMeasurement->name = $request->name;
        $unitOfMeasurement->acronym = $request->acronym;
        $unitOfMeasurement->user_updated_id = $request->user_updated_id;
        $unitOfMeasurement->update();
        return response()->json($unitOfMeasurement, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnitOfMeasurement  $unitOfMeasurement
     * @return \Illuminate\Http\Response
     * @OA\Delete(
     *  path="unit-of-measurements/{id}",
     *  operationId="deleteUnitOfMeasurement",
     *  tags={"UnitOfMeasurement"},
     *  summary="Delete existing UnitOfMeasurement",
     *  description="Deletes a record and returns no content",
     *  @OA\Parameter(
     *      name="id",
     *      description="UnitOfMeasurement id",
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
    public function destroy(UnitOfMeasurement $unitOfMeasurement)
    {
        $unitOfMeasurement->delete();
        return response('the data was deleted successfully', 200);
    }
}
