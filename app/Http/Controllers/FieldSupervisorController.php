<?php

namespace App\Http\Controllers;

use App\Helpers\RoleAcronym;
use App\Models\FieldSupervisor;
use App\Http\Requests\StoreFieldSupervisorRequest;
use App\Http\Requests\UpdateFieldSupervisorRequest;
use Illuminate\Http\Request;

class FieldSupervisorController extends Controller
{

    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      * @OA\Get(
      *     path="/field-supervisors",
      *     operationId="getFieldSupervisor",
      *     tags={"FieldSupervisor"},
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
      *         description="Show FieldSupervisors all."
      *     ),
      *     @OA\Response(
      *         response="default",
      *         description="error."
      *     )
      *  )
      */
    public function index(Request $request)
    {
        $fieldSupervisors = FieldSupervisor::ofType(RoleAcronym::FS)
            ->filters($request->all())
            ->search($request->all());

        return response()->json($fieldSupervisors, 200);
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
      * @param  \App\Http\Requests\StoreFieldSupervisorRequest  $request
      * @return \Illuminate\Http\Response
      * @OA\Post(
      *   path="/field-supervisors",
      *   summary="Creates a new FieldSupervisor",
      *   description="Creates a new FieldSupervisor",
      *   tags={"FieldSupervisor"},
      *   security={{"passport": {"*"}}},
      *   @OA\RequestBody(
      *       @OA\MediaType(
      *           mediaType="application/json",
      *           @OA\Schema(ref="#/components/schemas/FieldSupervisor")
      *       )
      *   ),
      *   @OA\Response(
      *       @OA\MediaType(mediaType="application/json"),
      *       response=200,
      *       description="The FieldSupervisor resource created",
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
    public function store(StoreFieldSupervisorRequest $request)
    {
        $fieldSupervisor = new FieldSupervisor();
        $fieldSupervisor->name = $request->name;
        $fieldSupervisor->last_name = $request->last_name;
        $fieldSupervisor->document_number = $request->document_number;
        $fieldSupervisor->email = $request->email;
        $fieldSupervisor->phone_number = $request->phone_number;
        $fieldSupervisor->user_created_id = $request->user_created_id;
        $fieldSupervisor->save();
        return response()->json($fieldSupervisor, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FieldSupervisor  $fieldSupervisor
     * @return \Illuminate\Http\Response
     * @OA\Get(
     *   path="/field-supervisors/{id}",
     *   operationId="getFieldSupervisorById",
     *   tags={"FieldSupervisor"},
     *   summary="Get FieldSupervisor information",
     *   description="Returns FieldSupervisor data",
     *   @OA\Parameter(
     *      name="id",
     *      description="FieldSupervisor id",
     *      required=true,
     *      in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/FieldSupervisor")
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
    public function show(FieldSupervisor $fieldSupervisor)
    {
        return response($fieldSupervisor, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FieldSupervisor  $fieldSupervisor
     * @return \Illuminate\Http\Response
     */
    public function edit(FieldSupervisor $fieldSupervisor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * @param  \App\Http\Requests\UpdateFieldSupervisorRequest  $request
     * @param  \App\Models\FieldSupervisor  $fieldSupervisor
     * @return \Illuminate\Http\Response
     * @OA\Put(
     *  path="/field-supervisors/{id}",
     *  operationId="updateFieldSupervisor",
     *  tags={"FieldSupervisor"},
     *  summary="Update existing FieldSupervisor",
     *  description="Returns updated FieldSupervisor data",
     *  @OA\Parameter(
     *      name="id",
     *      description="FieldSupervisor id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/FieldSupervisor")
     *   ),
     *   @OA\Response(
     *      response=202,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/FieldSupervisor")
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
    public function update(UpdateFieldSupervisorRequest $request, FieldSupervisor $fieldsSupervisor)
    {
        $fieldsSupervisor->name = $request->name;
        $fieldsSupervisor->last_name = $request->last_name;
        $fieldsSupervisor->document_number = $request->document_number;
        $fieldsSupervisor->email = $request->email;
        $fieldsSupervisor->phone_number = $request->phone_number;
        $fieldsSupervisor->user_updated_id = $request->user_updated_id;
        $fieldsSupervisor->update();
        return response()->json($fieldsSupervisor, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FieldSupervisor  $fieldSupervisor
     * @return \Illuminate\Http\Response
     * @OA\Delete(
     *  path="/field-supervisors/{id}",
     *  operationId="deleteFieldSupervisor",
     *  tags={"FieldSupervisor"},
     *  summary="Delete existing FieldSupervisor",
     *  description="Deletes a record and returns no content",
     *  @OA\Parameter(
     *      name="id",
     *      description="FieldSupervisor id",
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
    public function destroy(FieldSupervisor $fieldsSupervisor)
    {
        $fieldsSupervisor->delete();
        return response('the data was deleted successfully', 200);
    }
}
