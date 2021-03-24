<?php

namespace App\Http\Controllers;

use App\Models\OperationType;
use Illuminate\Http\Request;

class OperationTypeController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/operation-types",
     *     summary="Show operation types",
     *     tags={"OperationType"},
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
     *       description="OperationType resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="id",
     *           description="The unique identifier of a OperationType resource"
     *       )
     *     ),
     *     @OA\Parameter(
     *       name="sortOrder",
     *       in="query",
     *       description="OperationType resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="desc",
     *           description="The unique identifier of a OperationType resource"
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
     *           description="The unique identifier of a OperationType resource"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataSearch",
     *       in="query",
     *       description="OperationType resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="Search data"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataFilter",
     *       in="query",
     *       description="OperationType resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="The unique identifier of a OperationType resource"
     *       )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Show operation types all."
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
        $operationeTypes = OperationType::filters($request->all())->search($request->all());
        return response()->json($operationeTypes, 200);
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
        *   path="/api/operation-types",
        *   summary="Creates a new operation types",
        *   description="Creates a new operation types",
        *   tags={"OperationType"},
        *   security={{"passport": {"*"}}},
        *   @OA\RequestBody(
        *       @OA\MediaType(
        *           mediaType="application/json",
        *           @OA\Schema(ref="#/components/schemas/OperationType")
        *       )
        *   ),
        *   @OA\Response(
        *       @OA\MediaType(mediaType="application/json"),
        *       response=200,
        *       description="The OperationType resource created",
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
        $operationType = new OperationType();
        $operationType->name = $request->name;
        $operationType->description = $request->description;
        $operationType->user_created_id = $request->user_created_id;
        $operationType->save();
        return response()->json($operationType, 201);
    }
    /**
     * @OA\Get(
     *      path="/api/operation-types/{id}",
     *      operationId="getOperationTypeById",
     *      tags={"OperationType"},
     *      summary="Get OperationType information",
     *      description="Returns OperationType data",
     *      @OA\Parameter(
     *          name="id",
     *          description="OperationType id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/OperationType")
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
     * @param  \App\Models\OperationType  $operationType
     * @return \Illuminate\Http\Response
     */
    public function show(OperationType $operationType)
    {
        return response()->json($operationType, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OperationType  $operationType
     * @return \Illuminate\Http\Response
     */
    public function edit(OperationType $operationType)
    {
        //
    }
    /**
     * @OA\Put(
     *      path="/api/operation-types/{id}",
     *      operationId="updateOperationType",
     *      tags={"OperationType"},
     *      summary="Update existing OperationType",
     *      description="Returns updated OperationType data",
     *      @OA\Parameter(
     *          name="id",
     *          description="OperationType id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/OperationType")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/OperationType")
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
     * @param  \App\Models\OperationType  $operationType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OperationType $operationType)
    {
        $operationType->name = $request->name;
        $operationType->description = $request->description;
        $operationType->user_updated_id = $request->user_updated_id;
        $operationType->update();
        return response()->json($operationType, 200);
    }
    /**
     * @OA\Delete(
     *      path="/api/operation-types/{id}",
     *      operationId="deleteProject",
     *      tags={"OperationType"},
     *      summary="Delete existing OperationType",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="OperationType id",
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
     * @param  \App\Models\OperationType  $operationType
     * @return \Illuminate\Http\Response
     */
    public function destroy(OperationType $operationType)
    {
        $operationType->delete();
        return response()->json('succesfull delete', 200);
    }
}
