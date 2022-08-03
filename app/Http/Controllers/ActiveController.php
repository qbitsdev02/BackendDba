<?php

namespace App\Http\Controllers;

use App\Models\Active;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreActiveRequest;
use App\Http\Requests\UpdateActiveRequest;
use App\Http\Resources\ActiveResource;
use Illuminate\Http\Request;

class ActiveController extends Controller
{

    /**
      * 
      */
     function __construct()
     {
         $this->authorizeResource(Active::class,'active');
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
      * @OA\Get(
      *     path="/actives",
      *     operationId="getactive",
      *     tags={"Active"},
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
      *         description="active all."
      *     ),
      *     @OA\Response(
      *         response="default",
      *         description="error."
      *     )
      *  )
     */
    public function index(Request $request)
    {
        $actives = Active::filters($request->all())
        ->search($request->all());
    
        return (ActiveResource::collection($actives))->additional(
            [
                'message:' => 'Successfully response'
            ],200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreActiveRequest  $request
     * @return \Illuminate\Http\Response
     * 
    * @OA\Post(
    *   path="/actives",
    *   summary="Creates a new active",
    *   description="Creates a new active",
    *   tags={"Active"},
    *   security={{"passport": {"*"}}},
    *   @OA\RequestBody(
    *       @OA\MediaType(
    *           mediaType="application/json",
    *           @OA\Schema(ref="#/components/schemas/Active")
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
    public function store(StoreActiveRequest $request)
    {   
 
        $active = new Active();
        $active->name = $request->name;
        $active->status = $request->status;
        $active->description = $request->description;
        $active->ownerable_type = $request->ownerable_type;
        $active->ownerable_id = $request->ownerable_id;
        $active->user_created_id = $request->user_created_id;
        $active->save();

        return (new ActiveResource($active))->additional(
            [
                'message:' => 'successfully registered active'
            ],201
        );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Active  $active
     * @return \Illuminate\Http\Response
     * 
     * @OA\Get(
     *      path="/actives/{id}",
     *      operationId="getactivesById",
     *      tags={"Active"},
     *      summary="Get active information",
     *      description="Returns Port data",
     *   @OA\Parameter(
     *          name="id",
     *          description="Active id",
     *          required=true,
     *          in="path",
     *             @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Active")
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
    public function show(Active $active)
    {
        return (new ActiveResource($active))->additional(
            [
                'message:' => 'successfully response'
            ],200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateActiveRequest  $request
     * @param  \App\Models\Active  $active
     * @return \Illuminate\Http\Response
     * 
     * @OA\Put(
     *      path="/actives/{id}",
     *      operationId="updateactive",
     *      tags={"Active"},
     *      summary="Update existing Active",
     *      description="Returns updated port data",
     *  @OA\Parameter(
     *      name="id",
     *      description="Active id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Active")
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/Active")
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
    public function update(UpdateActiveRequest $request, Active $active)
    {
        $active->name = $request->name;
        $active->status = $request->status;
        $active->description = $request->description;
        $active->ownerable_type = $request->ownerable_type;
        $active->ownerable_id = $request->ownerable_id;
        $active->user_created_id = $request->user_created_id;

        $active->update();
        return (new ActiveResource($active))->additional(
            [
                'message:' => 'successfully updated active'
            ],200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Active  $active
     * @return \Illuminate\Http\Response
     * 
     * @OA\Delete(
     *  path="/actives/{id}",
     *  operationId="deleteactive",
     *  tags={"Active"},
     *  summary="Delete existing active",
     *  description="Deletes a record and returns no content",
     *  @OA\Parameter(
     *      name="id",
     *      description="active id",
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
    public function destroy(Active $active)
    {
        $active->delete();
        return response()->json(
            [
                'message' => 'the data was deleted successfully'
            ],200
        );
    }
}
