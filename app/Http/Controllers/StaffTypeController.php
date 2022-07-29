<?php

namespace App\Http\Controllers;

use App\Models\StaffType;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStaffTypeRequest;
use App\Http\Requests\UpdateStaffTypeRequest;
use App\Http\Resources\StaffTypeResource;
use Illuminate\Http\Request;

class StaffTypeController extends Controller
{

        /**
     * Create the controller instance to Authorizing Resource Controller.
     *  
     * You may make use of the (authorizeResource) method in your controller's constructor. 
     * This method will attach the appropriate can middleware definitions to the resource controller's methods.
     */
    public function __construct(){
        $this->authorizeResource(StaffType::class, 'staff-type');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
      * @OA\Get(
      *     path="/staff-types",
      *     operationId="getstaffType",
      *     tags={"StaffType"},
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
      *         description="Staff type all."
      *     ),
      *     @OA\Response(
      *         response="default",
      *         description="error."
      *     )
      *  )
     */
    public function index(Request $request)
    {
        $staffTypes = StaffType::filters($request->all())
            ->search($request->all());

        return (StaffTypeResource::collection($staffTypes))->additional(
            [
                "message" => "successfully response"
            ],200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStaffTypeRequest  $request
     * @return \Illuminate\Http\Response
     * 
     * @OA\Post(
     *   path="/staff-types",
     *   summary="Creates a new staff type",
     *   description="Creates a new staff type",
     *   tags={"StaffType"},
     *   security={{"passport": {"*"}}},
     *   @OA\RequestBody(
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/StaffType")
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
    public function store(StoreStaffTypeRequest $request)
    {
        $staffType = new StaffType();
        $staffType->name = $request->name;
        $staffType->description = $request->description;
        $staffType->user_created_id =$request->user_created_id;

        $staffType->save();

        return (new StaffTypeResource($staffType))->additional(
            [
                "message" => " successfully registerd staff  type"
            ],201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StaffType  $staffType
     * @return \Illuminate\Http\Response
     * 
     * @OA\Get(
     *      path="/staff-types/{id}",
     *      operationId="getstaffTypeId",
     *      tags={"StaffType"},
     *      summary="Get Staff type information",
     *      description="Returns Staff type data",
     *   @OA\Parameter(
     *          name="id",
     *          description="Staff type id",
     *          required=true,
     *          in="path",
     *             @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/StaffType")
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
    public function show(StaffType $staffType)
    {
        return (new StaffTypeResource($staffType))->additional(
            [
                "message" => "successfully response"
            ],200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStaffTypeRequest  $request
     * @param  \App\Models\StaffType  $staffType
     * @return \Illuminate\Http\Response
     * 
     * @OA\Put(
     *      path="/staff-types/{id}",
     *      operationId="updatestaffType",
     *      tags={"StaffType"},
     *      summary="Update existing staff type",
     *      description="Returns updated rate data",
     *  @OA\Parameter(
     *      name="id",
     *      description="staff type id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/StaffType")
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/StaffType")
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
    public function update(UpdateStaffTypeRequest $request, StaffType $staffType)
    {
        $staffType->name = $request->name;
        $staffType->description = $request->description;
        $staffType->user_update_id = $request->user_update_id;

        $staffType->update();

        return (new StaffTypeResource($staffType))->additional(
            [
                "message" => "successfully updated staff type"
            ],200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StaffType  $staffType
     * @return \Illuminate\Http\Response
     * 
     * @OA\Delete(
     *  path="/staff-types/{id}",
     *  operationId="deletestaffType",
     *  tags={"StaffType"},
     *  summary="Delete existing staff type",
     *  description="Deletes a record and returns no content",
     *  @OA\Parameter(
     *      name="id",
     *      description="staff type id",
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
    public function destroy(StaffType $staffType)
    {
        $staffType->delete();
        return response()->json(
            [
                "messasge" => "data was delete successfully"
            ],200
        );
    }
}
