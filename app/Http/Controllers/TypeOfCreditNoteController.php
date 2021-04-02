<?php

namespace App\Http\Controllers;

use App\Models\TypeOfCreditNote;
use Illuminate\Http\Request;

class TypeOfCreditNoteController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/type-of-credit-notes",
     *     summary="Show type of credit notes",
     *     tags={"TypeOfCreditNote"},
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
     *       description="TypeOfCreditNote resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="id",
     *           description="The unique identifier of a TypeOfCreditNote resource"
     *       )
     *     ),
     *     @OA\Parameter(
     *       name="sortOrder",
     *       in="query",
     *       description="TypeOfCreditNote resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="desc",
     *           description="The unique identifier of a TypeOfCreditNote resource"
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
     *           description="The unique identifier of a TypeOfCreditNote resource"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataSearch",
     *       in="query",
     *       description="TypeOfCreditNote resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="Search data"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataFilter",
     *       in="query",
     *       description="TypeOfCreditNote resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="The unique identifier of a TypeOfCreditNote resource"
     *       )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Show type of credit notes all."
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
        $typeOfCreditNotes = TypeOfCreditNote::filters($request->all())->search($request->all());
        return response()->json($typeOfCreditNotes, 200);
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
        *   path="/api/type-of-credit-notes",
        *   summary="Creates a new type of credit notes",
        *   description="Creates a new type of credit notes",
        *   tags={"TypeOfCreditNote"},
        *   security={{"passport": {"*"}}},
        *   @OA\RequestBody(
        *       @OA\MediaType(
        *           mediaType="application/json",
        *           @OA\Schema(ref="#/components/schemas/TypeOfCreditNote")
        *       )
        *   ),
        *   @OA\Response(
        *       @OA\MediaType(mediaType="application/json"),
        *       response=200,
        *       description="The TypeOfCreditNote resource created",
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
        $typeOfCreditNote = new TypeOfCreditNote();
        $typeOfCreditNote->name = $request->name;
        $typeOfCreditNote->description = $request->description;
        $typeOfCreditNote->user_created_id = $request->user_created_id;
        $typeOfCreditNote->save();
        return response()->json($typeOfCreditNote, 201);
    }
    /**
     * @OA\Get(
     *      path="/api/type-of-credit-notes/{id}",
     *      operationId="getTypeOfCreditNoteById",
     *      tags={"TypeOfCreditNote"},
     *      summary="Get TypeOfCreditNote information",
     *      description="Returns TypeOfCreditNote data",
     *      @OA\Parameter(
     *          name="id",
     *          description="TypeOfCreditNote id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/TypeOfCreditNote")
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
     * @param  \App\Models\TypeOfCreditNote  $typeOfCreditNote
     * @return \Illuminate\Http\Response
     */
    public function show(TypeOfCreditNote $typeOfCreditNote)
    {
        return response()->json($typeOfCreditNote, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeOfCreditNote  $typeOfCreditNote
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeOfCreditNote $typeOfCreditNote)
    {
        //
    }
    /**
     * @OA\Put(
     *      path="/api/type-of-credit-notes/{id}",
     *      operationId="updateTypeOfCreditNote",
     *      tags={"TypeOfCreditNote"},
     *      summary="Update existing TypeOfCreditNote",
     *      description="Returns updated TypeOfCreditNote data",
     *      @OA\Parameter(
     *          name="id",
     *          description="TypeOfCreditNote id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/TypeOfCreditNote")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/TypeOfCreditNote")
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
     * @param  \App\Models\TypeOfCreditNote  $typeOfCreditNote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeOfCreditNote $typeOfCreditNote)
    {
        $typeOfCreditNote->name = $request->name;
        $typeOfCreditNote->description = $request->description;
        $typeOfCreditNote->user_updated_id = $request->user_updated_id;
        $typeOfCreditNote->update();
        return response()->json($typeOfCreditNote, 200);
    }
    /**
     * @OA\Delete(
     *      path="/api/type-of-credit-notes/{id}",
     *      operationId="deleteProject",
     *      tags={"TypeOfCreditNote"},
     *      summary="Delete existing TypeOfCreditNote",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="TypeOfCreditNote id",
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
     * @param  \App\Models\TypeOfCreditNote  $typeOfCreditNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeOfCreditNote $typeOfCreditNote)
    {
        $typeOfCreditNote->delete();
        return response()->json('succesfull delete', 200);
    }
}
