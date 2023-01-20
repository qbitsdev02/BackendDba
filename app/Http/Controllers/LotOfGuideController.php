<?php

namespace App\Http\Controllers;

use App\Models\LotOfGuide;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LotOfGuideController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/lot-of-guides",
    *     summary="Show lot-of-guides",
    *     tags={"LotOfGuides"},
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
    *         description="Show lot-of-guides all."
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
        $lotOfGuides = LotOfGuide::filters($request->all())
            ->search($request->all());
        return response()->json($lotOfGuides, 200);
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
        *   path="/api/lot-of-guides",
        *   summary="Creates a new user",
        *   description="Creates a new user",
        *   tags={"LotOfGuides"},
        *   security={{"passport": {"*"}}},
        *   @OA\RequestBody(
        *       @OA\MediaType(
        *           mediaType="application/json",
        *           @OA\Schema(ref="#/components/schemas/LotOfGuide")
        *       )
        *   ),
        *   @OA\Response(
        *       @OA\MediaType(mediaType="application/json"),
        *       response=200,
        *       description="The LotOfGuide resource created",
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
        $lotOfGuide = new LotOfGuide();
        $lotOfGuide->lot_number = LotOfGuide::whereYear('created_at', Carbon::now()->format('Y'))->count() + 1;
        $lotOfGuide->user_created_id = $request->user_created_id;
        $lotOfGuide->save();
        return response()->json($lotOfGuide, 201);
    }
    /**
     * @OA\Get(
     *      path="/api/lot-of-guides/{id}",
     *      operationId="getUserById",
     *      tags={"LotOfGuides"},
     *      summary="Get LotOfGuide information",
     *      description="Returns LotOfGuide data",
     *      @OA\Parameter(
     *          name="id",
     *          description="LotOfGuide id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/LotOfGuide")
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
    public function show(LotOfGuide $lotOfGuide)
    {
        return response()->json($lotOfGuide, 201);
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
     *      path="/api/lot-of-guides/{id}",
     *      operationId="updateLotOfGuide",
     *      tags={"LotOfGuides"},
     *      summary="Update existing LotOfGuide",
     *      description="Returns updated LotOfGuide data",
     *      @OA\Parameter(
     *          name="id",
     *          description="LotOfGuide id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/LotOfGuide")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/LotOfGuide")
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
    public function update(Request $request, LotOfGuide $lotOfGuide)
    {
        $lotOfGuide->lot_number = $request->lot_number;
        $lotOfGuide->user_updated_id = $request->user_updated_id;
        $lotOfGuide->updated_at = Carbon::now();
        $lotOfGuide->update();
        return response()->json($lotOfGuide, 200);
    }
    /**
     * @OA\Delete(
     *      path="/api/lot-of-guides/{id}",
     *      operationId="deleteProject",
     *      tags={"LotOfGuides"},
     *      summary="Delete existing LotOfGuide",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="LotOfGuide id",
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
    public function destroy(LotOfGuide $lotOfGuide)
    {
        $lotOfGuide->delete();
        return response()->json('succesfull delete', 200);
    }
}
