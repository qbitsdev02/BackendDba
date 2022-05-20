<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use App\Http\Requests\StoreGuideRequest;
use App\Http\Requests\UpdateGuideRequest;
use Illuminate\Http\Request;

class GuideController extends Controller
{

    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      * @OA\Get(
      *     path="/guides",
      *     operationId="getGuide",
      *     tags={"Guide"},
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
      *         description="Show Guides all."
      *     ),
      *     @OA\Response(
      *         response="default",
      *         description="error."
      *     )
      *  )
      */
    public function index(Request $request)
    {
        $guides = Guide::filters($request->all())->search($request->all());
        return response()->json($guides, 200);
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
      * @param  \App\Http\Requests\StoreGuideRequest  $request
      * @return \Illuminate\Http\Response
      * @OA\Post(
      *   path="/guides",
      *   summary="Creates a new Guide",
      *   description="Creates a new Guide",
      *   tags={"Guide"},
      *   security={{"passport": {"*"}}},
      *   @OA\RequestBody(
      *       @OA\MediaType(
      *           mediaType="application/json",
      *           @OA\Schema(ref="#/components/schemas/Guide")
      *       )
      *   ),
      *   @OA\Response(
      *       @OA\MediaType(mediaType="application/json"),
      *       response=200,
      *       description="The Guide resource created",
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
    public function store(StoreGuideRequest $request)
    {
        $guide = new Guide();
        $guide->material_supplier_id = $request->material_supplier_id;
        $guide->vehicle_id = $request->vehicle_id;
        $guide->client_id = $request->client_id;
        $guide->trailer_id = $request->trailer_id;
        $guide->start_date = $request->start_date;
        $guide->deadline = $request->deadline;
        $guide->origin_address = $request->origin_address;
        $guide->destination_address = $request->destination_address;
        $guide->material = $request->material;
        $guide->code_runpa = $request->code_runpa;
        $guide->driver_id = $request->driver_id;
        $guide->user_created_id = $request->user_created_id;
        $guide->save();
        return response()->json($guide, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     * @OA\Get(
     *   path="/guides/{id}",
     *   operationId="getGuideById",
     *   tags={"Guide"},
     *   summary="Get Guide information",
     *   description="Returns Guide data",
     *   @OA\Parameter(
     *      name="id",
     *      description="Guide id",
     *      required=true,
     *      in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Guide")
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
    public function show(Guide $guide)
    {
        return response($guide, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function edit(Guide $guide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * @param  \App\Http\Requests\UpdateGuideRequest  $request
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     * @OA\Put(
     *  path="/guides/{id}",
     *  operationId="updateGuide",
     *  tags={"Guide"},
     *  summary="Update existing Guide",
     *  description="Returns updated Guide data",
     *  @OA\Parameter(
     *      name="id",
     *      description="Guide id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Guide")
     *   ),
     *   @OA\Response(
     *      response=202,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/Guide")
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
    public function update(UpdateGuideRequest $request, Guide $guide)
    {
        $guide->material_supplier_id = $request->material_supplier_id;
        $guide->vehicle_id = $request->vehicle_id;
        $guide->client_id = $request->client_id;
        $guide->trailer_id = $request->trailer_id;
        $guide->start_date = $request->start_date;
        $guide->deadline = $request->deadline;
        $guide->origin_address = $request->origin_address;
        $guide->destination_address = $request->destination_address;
        $guide->material = $request->material;
        $guide->code_runpa = $request->code_runpa;
        $guide->driver_id = $request->driver_id;
        $guide->user_updated_id = $request->user_updated_id;
        $guide->update();
        return response()->json($guide, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     * @OA\Delete(
     *  path="/guides/{id}",
     *  operationId="deleteGuide",
     *  tags={"Guide"},
     *  summary="Delete existing Guide",
     *  description="Deletes a record and returns no content",
     *  @OA\Parameter(
     *      name="id",
     *      description="Guide id",
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
    public function destroy(Guide $guide)
    {
        $guide->delete();
        return response('the data was deleted successfully', 200);
    }
}
