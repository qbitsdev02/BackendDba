<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePersonalRequest;
use App\Http\Requests\UpdatePersonalRequest;
use App\Http\Resources\PersonalResource;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PersonalController extends Controller
{

        /**
     * Create the controller instance to Authorizing Resource Controller.
     *
     * You may make use of the (authorizeResource) method in your controller's constructor.
     * This method will attach the appropriate can middleware definitions to the resource controller's methods.
     */
/*
     public function __construct()
    {
        $this->authorizeResource(Personal::class, 'personal');
    }
*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
      * @OA\Get(
      *     path="/personals",
      *     operationId="getpersonal",
      *     tags={"Personal"},
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
      *         description="personal all."
      *     ),
      *     @OA\Response(
      *         response="default",
      *         description="error."
      *     )
      *  )
     */
    public function index(Request $request)
    {
        $personals = Personal::filters($request->all())
            ->search($request->all());

        return (PersonalResource::collection($personals))->additional(
            [
                'message:' => 'Successfully response'
            ],200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePersonalRequest  $request
     * @return \Illuminate\Http\Response
     *
    * @OA\Post(
    *   path="/personals",
    *   summary="Creates a new personal",
    *   description="Creates a new personal",
    *   tags={"Personal"},
    *   security={{"passport": {"*"}}},
    *   @OA\RequestBody(
    *       @OA\MediaType(
    *           mediaType="application/json",
    *           @OA\Schema(ref="#/components/schemas/Personal")
    *       )
    *   ),
    *   @OA\Response(
    *       @OA\MediaType(mediaType="application/json"),
    *       response=200,
    *       description="The personal resource created",
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
    public function store(StorePersonalRequest $request)
    {
        $personal = new Personal();
        $personal->name = $request->name;
        $personal->last_name = $request->last_name;
        $personal->document_number = $request->document_number;
        $personal->address = $request->address;
        $personal->phone_number = $request->phone_number;
        $personal->ownerable_type = $request->ownerable_type;
        $personal->ownerable_id = $request->ownerable_id;
        $personal->staff_type_id = $request->staff_type_id;
        $personal->user_id = $request->user_id;
        $personal->user_created_id = $request->user_created_id;

        $personal->save();

        return (new PersonalResource($personal))->additional(
            [
                'message:' => 'successfully registered personal'
            ],201
        );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *      path="/personals/{id}",
     *      operationId="getpersonalById",
     *      tags={"Personal"},
     *      summary="Get personal information",
     *      description="Returns personal data",
     *   @OA\Parameter(
     *          name="id",
     *          description="personal id",
     *          required=true,
     *          in="path",
     *             @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Personal")
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
    public function show(Personal $personal)
    {
        return (new PersonalResource($personal))->additional(
            [
                'message:' => 'successfully response'
            ],200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePersonalRequest  $request
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     *
     * @OA\Put(
     *      path="/personals/{id}",
     *      operationId="updatepersonal",
     *      tags={"Personal"},
     *      summary="Update existing personal",
     *      description="Returns updated personal data",
     *  @OA\Parameter(
     *      name="id",
     *      description="personal id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Personal")
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/Personal")
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
    public function update(UpdatePersonalRequest $request, Personal $personal)
    {
        $personal->name = $request->name;
        $personal->last_name = $request->last_name;
        $personal->document_number = $request->document_number;
        $personal->address = $request->address;
        $personal->phone_number = $request->phone_number;
        $personal->ownerable_type = $request->ownerable_type;
        $personal->ownerable_id = $request->ownerable_id;
        $personal->staff_type_id = $request->staff_type_id;
        $personal->user_id = $request->user_id;
        $personal->user_updated_id = $request->user_updated_id;
        $personal->updated_at = Carbon::now();
        $personal->update();

        return (new PersonalResource($personal))->additional(
            [
                'message:' => 'successfully updated personal'
            ],200
        );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     *
     * @OA\Delete(
     *  path="/personals/{id}",
     *  operationId="deletepersonal",
     *  tags={"Personal"},
     *  summary="Delete existing personal",
     *  description="Deletes a record and returns no content",
     *  @OA\Parameter(
     *      name="id",
     *      description="personal id",
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
    public function destroy(Personal $personal)
    {
        $personal->delete();
        return response()->json(
            [
                'message' => 'the data was deleted successfully'
            ],200
        );
    }
}
