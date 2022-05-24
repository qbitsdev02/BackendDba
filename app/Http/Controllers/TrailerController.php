<?php

namespace App\Http\Controllers;

use App\Models\Trailer;
use App\Http\Requests\StoreTrailerRequest;
use App\Http\Requests\UpdateTrailerRequest;
use Illuminate\Http\Request;

class TrailerController extends Controller
{

    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      * @OA\Get(
      *     path="/trailers",
      *     operationId="getTrailer",
      *     tags={"Trailer"},
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
      *         description="Show Trailers all."
      *     ),
      *     @OA\Response(
      *         response="default",
      *         description="error."
      *     )
      *  )
      */
    public function index(Request $request)
    {
        $trailers = Trailer::with('ownerable')
            ->filters($request->all())
            ->search($request->all());
        return response()->json($trailers, 200);
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
      * @param  \App\Http\Requests\StoreTrailerRequest  $request
      * @return \Illuminate\Http\Response
      * @OA\Post(
      *   path="/trailers",
      *   summary="Creates a new Trailer",
      *   description="Creates a new Trailer",
      *   tags={"Trailer"},
      *   security={{"passport": {"*"}}},
      *   @OA\RequestBody(
      *       @OA\MediaType(
      *           mediaType="application/json",
      *           @OA\Schema(ref="#/components/schemas/Trailer")
      *       )
      *   ),
      *   @OA\Response(
      *       @OA\MediaType(mediaType="application/json"),
      *       response=200,
      *       description="The Trailer resource created",
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
    public function store(StoreTrailerRequest $request)
    {
        $trailer = new Trailer();
        $trailer->brand = $request->brand;
        $trailer->model = $request->model;
        $trailer->color = $request->color;
        $trailer->plate = $request->plate;
        $trailer->ownerable_type = $request->ownerable_type;
        $trailer->ownerable_id = $request->ownerable_id;
        $trailer->user_created_id = $request->user_created_id;
        $trailer->save();
        return response()->json($trailer, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trailer  $trailer
     * @return \Illuminate\Http\Response
     * @OA\Get(
     *   path="/trailers/{id}",
     *   operationId="getTrailerById",
     *   tags={"Trailer"},
     *   summary="Get Trailer information",
     *   description="Returns Trailer data",
     *   @OA\Parameter(
     *      name="id",
     *      description="Trailer id",
     *      required=true,
     *      in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Trailer")
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
    public function show(Trailer $trailer)
    {
        return response($trailer, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trailer  $trailer
     * @return \Illuminate\Http\Response
     */
    public function edit(Trailer $trailer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * @param  \App\Http\Requests\UpdateTrailerRequest  $request
     * @param  \App\Models\Trailer  $trailer
     * @return \Illuminate\Http\Response
     * @OA\Put(
     *  path="/trailers/{id}",
     *  operationId="updateTrailer",
     *  tags={"Trailer"},
     *  summary="Update existing Trailer",
     *  description="Returns updated Trailer data",
     *  @OA\Parameter(
     *      name="id",
     *      description="Trailer id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Trailer")
     *   ),
     *   @OA\Response(
     *      response=202,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/Trailer")
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
    public function update(UpdateTrailerRequest $request, Trailer $trailer)
    {
        $trailer->brand = $request->brand;
        $trailer->model = $request->model;
        $trailer->plate = $request->plate;
        $trailer->color = $request->color;
        $trailer->ownerable_type = $request->ownerable_type;
        $trailer->ownerable_id = $request->ownerable_id;
        $trailer->user_updated_id = $request->user_updated_id;
        $trailer->update();
        return response()->json($trailer, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trailer  $trailer
     * @return \Illuminate\Http\Response
     * @OA\Delete(
     *  path="/trailers/{id}",
     *  operationId="deleteTrailer",
     *  tags={"Trailer"},
     *  summary="Delete existing Trailer",
     *  description="Deletes a record and returns no content",
     *  @OA\Parameter(
     *      name="id",
     *      description="Trailer id",
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
    public function destroy(Trailer $trailer)
    {
        $trailer->delete();
        return response('the data was deleted successfully', 200);
    }
}
