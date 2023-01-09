<?php

namespace App\Http\Controllers;

use App\Models\GuideServiceCost;
use Illuminate\Http\Request;

class GuideServiceCostController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/guide-service-costs",
    *     summary="Show guide-service-costs",
    *     tags={"GuideServiceCosts"},
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
    *         description="Show guide-service-costs all."
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
        $guideServiceCosts = GuideServiceCost::filters($request->all())
            ->search($request->all());
        return response()->json($guideServiceCosts, 200);
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
        *   path="/api/guide-service-costs",
        *   summary="Creates a new user",
        *   description="Creates a new user",
        *   tags={"GuideServiceCosts"},
        *   security={{"passport": {"*"}}},
        *   @OA\RequestBody(
        *       @OA\MediaType(
        *           mediaType="application/json",
        *           @OA\Schema(ref="#/components/schemas/GuideServiceCost")
        *       )
        *   ),
        *   @OA\Response(
        *       @OA\MediaType(mediaType="application/json"),
        *       response=200,
        *       description="The GuideServiceCost resource created",
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
        $guideServiceCost = new GuideServiceCost();
        $guideServiceCost->name = $request->name;
        $guideServiceCost->acronym = $request->acronym;
        $guideServiceCost->user_created_id = $request->user_created_id;
        $guideServiceCost->save();
        return response()->json($guideServiceCost, 201);
    }
    /**
     * @OA\Get(
     *      path="/api/guide-service-costs/{id}",
     *      operationId="getUserById",
     *      tags={"GuideServiceCosts"},
     *      summary="Get GuideServiceCost information",
     *      description="Returns GuideServiceCost data",
     *      @OA\Parameter(
     *          name="id",
     *          description="GuideServiceCost id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/GuideServiceCost")
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
    public function show(GuideServiceCost $guideServiceCost)
    {
        return response()->json($guideServiceCost, 201);
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
     *      path="/api/guide-service-costs/{id}",
     *      operationId="updateGuideServiceCost",
     *      tags={"GuideServiceCosts"},
     *      summary="Update existing GuideServiceCost",
     *      description="Returns updated GuideServiceCost data",
     *      @OA\Parameter(
     *          name="id",
     *          description="GuideServiceCost id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/GuideServiceCost")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/GuideServiceCost")
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
    public function update(Request $request, GuideServiceCost $guideServiceCost)
    {
        $guideServiceCost->name = $request->name;
        $guideServiceCost->acronym = $request->acronym;
        $guideServiceCost->user_updated_id = $request->user_updated_id;
        $guideServiceCost->updated_at = \Carbon\Carbon::now();
        $guideServiceCost->update();
        return response()->json($guideServiceCost, 200);
    }
    /**
     * @OA\Delete(
     *      path="/api/guide-service-costs/{id}",
     *      operationId="deleteProject",
     *      tags={"GuideServiceCosts"},
     *      summary="Delete existing GuideServiceCost",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="GuideServiceCost id",
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
    public function destroy(GuideServiceCost $guideServiceCost)
    {
        $guideServiceCost->delete();
        return response()->json('succesfull delete', 200);
    }
}
