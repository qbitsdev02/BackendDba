<?php

namespace App\Http\Controllers;

use App\Models\BranchOffice;
use Illuminate\Http\Request;

class BranchOfficeController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/branch-offices",
     *     summary="Show branch offices",
     *     tags={"BranchOffice"},
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
     *       description="BranchOffice resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="id",
     *           description="The unique identifier of a BranchOffice resource"
     *       )
     *     ),
     *     @OA\Parameter(
     *       name="sortOrder",
     *       in="query",
     *       description="BranchOffice resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="desc",
     *           description="The unique identifier of a BranchOffice resource"
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
     *           description="The unique identifier of a BranchOffice resource"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataSearch",
     *       in="query",
     *       description="BranchOffice resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="Search data"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataFilter",
     *       in="query",
     *       description="BranchOffice resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="The unique identifier of a BranchOffice resource"
     *       )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Show branch offices all."
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
        $branchOffices = BranchOffice::filters($request->all())->search($request->all());
        return response()->json($branchOffices, 200);
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
        *   path="/api/branch-offices",
        *   summary="Creates a new branch offices",
        *   description="Creates a new branch offices",
        *   tags={"BranchOffice"},
        *   security={{"passport": {"*"}}},
        *   @OA\RequestBody(
        *       @OA\MediaType(
        *           mediaType="application/json",
        *           @OA\Schema(ref="#/components/schemas/BranchOffice")
        *       )
        *   ),
        *   @OA\Response(
        *       @OA\MediaType(mediaType="application/json"),
        *       response=200,
        *       description="The BranchOffice resource created",
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
        $branchOffice = new BranchOffice();
        $branchOffice->name = $request->name;
        $branchOffice->description = $request->description;
        $branchOffice->user_created_id = $request->user_created_id;
        $branchOffice->save();
        return response()->json($branchOffice, 201);
    }
    /**
     * @OA\Get(
     *      path="/api/branch-offices/{id}",
     *      operationId="getBranchOfficeById",
     *      tags={"BranchOffice"},
     *      summary="Get BranchOffice information",
     *      description="Returns BranchOffice data",
     *      @OA\Parameter(
     *          name="id",
     *          description="BranchOffice id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/BranchOffice")
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
     * @param  \App\Models\BranchOffice  $branchOffice
     * @return \Illuminate\Http\Response
     */
    public function show(BranchOffice $branchOffice)
    {
        return response()->json($branchOffice, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BranchOffice  $branchOffice
     * @return \Illuminate\Http\Response
     */
    public function edit(BranchOffice $branchOffice)
    {
        //
    }
    /**
     * @OA\Put(
     *      path="/api/branch-offices/{id}",
     *      operationId="updateBranchOffice",
     *      tags={"BranchOffice"},
     *      summary="Update existing BranchOffice",
     *      description="Returns updated BranchOffice data",
     *      @OA\Parameter(
     *          name="id",
     *          description="BranchOffice id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/BranchOffice")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/BranchOffice")
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
     * @param  \App\Models\BranchOffice  $branchOffice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BranchOffice $branchOffice)
    {
        $branchOffice->name = $request->name;
        $branchOffice->description = $request->description;
        $branchOffice->user_updated_id = $request->user_updated_id;
        $branchOffice->update();
        return response()->json($branchOffice, 200);
    }
    /**
     * @OA\Delete(
     *      path="/api/branch-offices/{id}",
     *      operationId="deleteProject",
     *      tags={"BranchOffice"},
     *      summary="Delete existing BranchOffice",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="BranchOffice id",
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
     * @param  \App\Models\BranchOffice  $branchOffice
     * @return \Illuminate\Http\Response
     */
    public function destroy(BranchOffice $branchOffice)
    {
        $branchOffice->delete();
        return response()->json('succesfull delete', 200);
    }
}
