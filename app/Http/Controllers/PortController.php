<?php

namespace App\Http\Controllers;

use App\Http\Resources\PortResource;
use App\Models\Port;
use Illuminate\Http\Request;

class PortController extends Controller
{

    /**
     * Create the controller instance to Authorizing Resource Controller.
     *  
     * You may make use of the (authorizeResource) method in your controller's constructor. 
     * This method will attach the appropriate can middleware definitions to the resource controller's methods.
     */
    public function __construct(){
        $this->authorizeResource(Port::class, 'port');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
      * @OA\Get(
      *     path="/ports",
      *     operationId="getport",
      *     tags={"Port"},
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
      *         description="port all."
      *     ),
      *     @OA\Response(
      *         response="default",
      *         description="error."
      *     )
      *  )
     * 
     */
    public function index(Request $request)
    {
        $ports = Port::filters($request->all())
            ->search($request->all());

        return (PortResource::collection($ports))->additional(
            [
                'message:' => 'Successfully response'
            ],200
        );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    * 
    * @OA\Post(
    *   path="/ports",
    *   summary="Creates a new port",
    *   description="Creates a new port",
    *   tags={"Port"},
    *   security={{"passport": {"*"}}},
    *   @OA\RequestBody(
    *       @OA\MediaType(
    *           mediaType="application/json",
    *           @OA\Schema(ref="#/components/schemas/Port")
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
     * 
     */
    public function store(Request $request)
    {
        $port = new Port();
        $port->name = $request->name;
        $port->rif = $request->rif;
        $port->city = $request->city;
        $port->state = $request->state;
        $port->user_created_id = $request->user_created_id;

        $port->save();

        return (new PortResource($port))->additional(
            [
                'message:' => 'successfully registered port'
            ],201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Port  $port
     * @return \Illuminate\Http\Response
     * 
     * @OA\Get(
     *      path="/ports/{id}",
     *      operationId="getportById",
     *      tags={"Port"},
     *      summary="Get Port information",
     *      description="Returns Port data",
     *   @OA\Parameter(
     *          name="id",
     *          description="port id",
     *          required=true,
     *          in="path",
     *             @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Port")
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
    public function show(Port $port)
    {
        return (new PortResource($port))->additional(
            [
                'message:' => 'successfully response'
            ],200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Port  $port
     * @return \Illuminate\Http\Response
     * 
     * @OA\Put(
     *      path="/ports/{id}",
     *      operationId="updateport",
     *      tags={"Port"},
     *      summary="Update existing port",
     *      description="Returns updated port data",
     *  @OA\Parameter(
     *      name="id",
     *      description="port id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Port")
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/Port")
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
    public function update(Request $request, Port $port)
    {
        $port->name = $request->name;
        $port->rif = $request->rif;
        $port->city = $request->city;
        $port->state = $request->state;
        $port->user_updated_id = $request->user_updated_id;

        $port->update();

        return (new PortResource($port))->additional(
            [
                'message:' => 'successfully updated port'
            ],200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Port  $port
     * @return \Illuminate\Http\Response
     * 
     * @OA\Delete(
     *  path="/ports/{id}",
     *  operationId="deleteport",
     *  tags={"Port"},
     *  summary="Delete existing port",
     *  description="Deletes a record and returns no content",
     *  @OA\Parameter(
     *      name="id",
     *      description="port id",
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
    public function destroy(Port $port)
    {
        $port->delete();
        return response()->json(
            [
                'message' => 'the data was deleted successfully'
            ],200
        );
    }
}
