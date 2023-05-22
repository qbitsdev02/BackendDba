<?php

namespace App\Http\Controllers;

use App\Models\GuideOwner;
use Illuminate\Http\Request;

class GuideOwnerController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/guide-owners",
    *     summary="Show GuideOwners",
    *     tags={"GuideOwner"},
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
    *         description="Show GuideOwners all."
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
        $guideOwners = GuideOwner::with('modules:id,name')
            ->filters($request->all())
            ->search($request->all());
        return response()->json($guideOwners, 200);
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
        *   path="/api/guide-owners",
        *   summary="Creates a new user",
        *   description="Creates a new user",
        *   tags={"GuideOwner"},
        *   security={{"passport": {"*"}}},
        *   @OA\RequestBody(
        *       @OA\MediaType(
        *           mediaType="application/json",
        *           @OA\Schema(ref="#/components/schemas/GuideOwner")
        *       )
        *   ),
        *   @OA\Response(
        *       @OA\MediaType(mediaType="application/json"),
        *       response=200,
        *       description="The GuideOwner resource created",
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
        $guideOwner = new GuideOwner();
        $guideOwner->guide_id = $request->guide_id;
        $guideOwner->ownerable_type = $request->ownerable_type;
        $guideOwner->ownerable_id = $request->ownerable_id;
        $guideOwner->responsable_id = $request->responsable_id;
        $guideOwner->responsable_type = $request->responsable_type;
        $guideOwner->user_created_id = $request->user_created_id;
        $guideOwner->save();
        return response()->json($guideOwner, 201);
    }
    /**
     * @OA\Get(
     *      path="/api/guide-owners/{id}",
     *      operationId="getUserById",
     *      tags={"GuideOwner"},
     *      summary="Get GuideOwner information",
     *      description="Returns GuideOwner data",
     *      @OA\Parameter(
     *          name="id",
     *          description="GuideOwner id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/GuideOwner")
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
    public function show(GuideOwner $guideOwner)
    {
        return response()->json($guideOwner, 201);
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
     *      path="/api/guide-owners/{id}",
     *      operationId="updateGuideOwner",
     *      tags={"GuideOwner"},
     *      summary="Update existing GuideOwner",
     *      description="Returns updated GuideOwner data",
     *      @OA\Parameter(
     *          name="id",
     *          description="GuideOwner id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/GuideOwner")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/GuideOwner")
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
    public function update(Request $request, GuideOwner $guideOwner)
    {
        $guideOwner->guide_id = $request->guide_id;
        $guideOwner->ownerable_type = $request->ownerable_type;
        $guideOwner->ownerable_id = $request->ownerable_id;
        $guideOwner->responsable_id = $request->responsable_id;
        $guideOwner->responsable_type = $request->responsable_type;
        $guideOwner->user_updated_id = $request->user_updated_id;
        $guideOwner->updated_at = \Carbon\Carbon::now();
        $guideOwner->update();
        return response()->json($guideOwner, 200);
    }
    /**
     * @OA\Delete(
     *      path="/api/guide-owners/{id}",
     *      operationId="deleteProject",
     *      tags={"GuideOwner"},
     *      summary="Delete existing GuideOwner",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="GuideOwner id",
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
    public function destroy(GuideOwner $guideOwner)
    {
        $guideOwner->delete();
        return response()->json('succesfull delete', 200);
    }
}
