<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/roles",
    *     summary="Show roles",
    *     tags={"Roles"},
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
    *         description="Show roles all."
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
        $roles = Role::with('modules:id,name')
            ->filters($request->all())
            ->search($request->all());
        return response()->json($roles, 200);
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
        *   path="/api/roles",
        *   summary="Creates a new user",
        *   description="Creates a new user",
        *   tags={"Roles"},
        *   security={{"passport": {"*"}}},
        *   @OA\RequestBody(
        *       @OA\MediaType(
        *           mediaType="application/json",
        *           @OA\Schema(ref="#/components/schemas/Role")
        *       )
        *   ),
        *   @OA\Response(
        *       @OA\MediaType(mediaType="application/json"),
        *       response=200,
        *       description="The Role resource created",
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
        $role = new Role();
        $role->name = $request->name;
        $role->acronym = $request->acronym;
        $role->user_created_id = $request->user_created_id;
        $role->save();
        return response()->json($role, 201);
    }
    /**
     * @OA\Get(
     *      path="/api/roles/{id}",
     *      operationId="getUserById",
     *      tags={"Roles"},
     *      summary="Get Role information",
     *      description="Returns Role data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Role id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Role")
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
    public function show(Role $role)
    {
        return response()->json($role, 201);
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
     *      path="/api/roles/{id}",
     *      operationId="updateRole",
     *      tags={"Roles"},
     *      summary="Update existing Role",
     *      description="Returns updated Role data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Role id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Role")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Role")
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
    public function update(Request $request, Role $role)
    {
        $role->name = $request->name;
        $role->acronym = $request->acronym;
        $role->user_updated_id = $request->user_updated_id;
        $role->updated_at = \Carbon\Carbon::now();
        $role->update();
        return response()->json($role, 200);
    }
    /**
     * @OA\Delete(
     *      path="/api/roles/{id}",
     *      operationId="deleteProject",
     *      tags={"Roles"},
     *      summary="Delete existing Role",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Role id",
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
    public function destroy(Role $role)
    {
        $role->delete();
        return response()->json('succesfull delete', 200);
    }
}
