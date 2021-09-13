<?php

namespace App\Http\Controllers;

use App\Models\Devolution;
use Illuminate\Http\Request;

class DevolutionController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/devolutions",
     *     summary="Show devolution",
     *     tags={"Devolution"},
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
     *       description="Devolution resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="id",
     *           description="The unique identifier of a Devolution resource"
     *       )
     *     ),
     *     @OA\Parameter(
     *       name="sortOrder",
     *       in="query",
     *       description="Devolution resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="desc",
     *           description="The unique identifier of a Devolution resource"
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
     *           description="The unique identifier of a Devolution resource"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataSearch",
     *       in="query",
     *       description="Devolution resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="Search data"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataFilter",
     *       in="query",
     *       description="Devolution resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="The unique identifier of a Devolution resource"
     *       )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Show devolution all."
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
        $devolution = Devolution::with(
            'devolutionReason:id,name',
            'user:id,name,last_name',
            'devolutionDetails.product:id,name,description'
        )
        ->filters($request->all())
        ->betweenDate($request->all())
        ->search($request->all());
        return response()->json($devolution, 200);
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
     *   path="/api/devolutions",
     *   summary="Creates a new devolution",
     *   description="Creates a new devolution",
     *   tags={"Devolution"},
     *   security={{"passport": {"*"}}},
     *   @OA\RequestBody(
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/Devolution")
     *       )
     *   ),
     *   @OA\Response(
     *       @OA\MediaType(mediaType="application/json"),
     *       response=200,
     *       description="The Devolution resource created",
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
        $devolution = new Devolution();
        $devolution->devolution_reason_id = $request->devolution_reason_id;
        $devolution->observation = $request->observation;
        $devolution->branch_office_id = $request->branch_office_id;
        $devolution->created_at = $request->created_at;
        $devolution->user_created_id = $request->user_created_id;
        $devolution->save();
        return response()->json($devolution, 201);
    }
    /**
     * @OA\Get(
     *      path="/api/devolutions/{id}",
     *      tags={"Devolution"},
     *      summary="Get Devolution information",
     *      description="Returns Devolution data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Devolution id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Devolution")
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
     * @param  \App\Models\Devolution  $devolution
     * @return \Illuminate\Http\Response
     */
    public function show(Devolution $devolution)
    {
        return response()->json($devolution, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Devolution  $devolution
     * @return \Illuminate\Http\Response
     */
    public function edit(Devolution $devolution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Devolution  $devolution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Devolution $devolution)
    {
        //
    }
    /**
     * @OA\Delete(
     *      path="/api/devolutions/{id}",
     *      tags={"Devolution"},
     *      summary="Delete existing Devolution",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Devolution id",
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
     * @param  \App\Models\Devolution  $devolution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Devolution $devolution)
    {
        $devolution->delete();
        return response()->json("delete succefull", 200);
    }
}
