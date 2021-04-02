<?php

namespace App\Http\Controllers;

use App\Models\VoucherTypeNote;
use Illuminate\Http\Request;

class VoucherTypeNoteController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/voucher-type-notes",
     *     summary="Show attribute type notes",
     *     tags={"VoucherTypeNote"},
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
     *       description="VoucherTypeNote resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="id",
     *           description="The unique identifier of a VoucherTypeNote resource"
     *       )
     *     ),
     *     @OA\Parameter(
     *       name="sortOrder",
     *       in="query",
     *       description="VoucherTypeNote resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="desc",
     *           description="The unique identifier of a VoucherTypeNote resource"
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
     *           description="The unique identifier of a VoucherTypeNote resource"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataSearch",
     *       in="query",
     *       description="VoucherTypeNote resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="Search data"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataFilter",
     *       in="query",
     *       description="VoucherTypeNote resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="The unique identifier of a VoucherTypeNote resource"
     *       )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Show attribute type notes all."
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
        $voucherTypeNoteNotes = VoucherTypeNote::filters($request->all())->search($request->all());
        return response()->json($voucherTypeNoteNotes, 200);
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
        *   path="/api/voucher-type-notes",
        *   summary="Creates a new attribute type notes",
        *   description="Creates a new attribute type notes",
        *   tags={"VoucherTypeNote"},
        *   security={{"passport": {"*"}}},
        *   @OA\RequestBody(
        *       @OA\MediaType(
        *           mediaType="application/json",
        *           @OA\Schema(ref="#/components/schemas/VoucherTypeNote")
        *       )
        *   ),
        *   @OA\Response(
        *       @OA\MediaType(mediaType="application/json"),
        *       response=200,
        *       description="The VoucherTypeNote resource created",
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
        $voucherTypeNote = new VoucherTypeNote();
        $voucherTypeNote->name = $request->name;
        $voucherTypeNote->description = $request->description;
        $voucherTypeNote->user_created_id = $request->user_created_id;
        $voucherTypeNote->save();
        return response()->json($voucherTypeNote, 201);
    }
    /**
     * @OA\Get(
     *      path="/api/voucher-type-notes/{id}",
     *      operationId="getVoucherTypeNoteById",
     *      tags={"VoucherTypeNote"},
     *      summary="Get VoucherTypeNote information",
     *      description="Returns VoucherTypeNote data",
     *      @OA\Parameter(
     *          name="id",
     *          description="VoucherTypeNote id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/VoucherTypeNote")
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
     * @param  \App\Models\VoucherTypeNote  $voucherTypeNote
     * @return \Illuminate\Http\Response
     */
    public function show(VoucherTypeNote $voucherTypeNote)
    {
        return response()->json($voucherTypeNote, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VoucherTypeNote  $voucherTypeNote
     * @return \Illuminate\Http\Response
     */
    public function edit(VoucherTypeNote $voucherTypeNote)
    {
        //
    }
    /**
     * @OA\Put(
     *      path="/api/voucher-type-notes/{id}",
     *      operationId="updateVoucherTypeNote",
     *      tags={"VoucherTypeNote"},
     *      summary="Update existing VoucherTypeNote",
     *      description="Returns updated VoucherTypeNote data",
     *      @OA\Parameter(
     *          name="id",
     *          description="VoucherTypeNote id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/VoucherTypeNote")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/VoucherTypeNote")
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
     * @param  \App\Models\VoucherTypeNote  $voucherTypeNote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VoucherTypeNote $voucherTypeNote)
    {
        $voucherTypeNote->name = $request->name;
        $voucherTypeNote->description = $request->description;
        $voucherTypeNote->user_updated_id = $request->user_updated_id;
        $voucherTypeNote->update();
        return response()->json($voucherTypeNote, 200);
    }
    /**
     * @OA\Delete(
     *      path="/api/voucher-type-notes/{id}",
     *      operationId="deleteProject",
     *      tags={"VoucherTypeNote"},
     *      summary="Delete existing VoucherTypeNote",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="VoucherTypeNote id",
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
     * @param  \App\Models\VoucherTypeNote  $voucherTypeNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(VoucherTypeNote $voucherTypeNote)
    {
        $voucherTypeNote->delete();
        return response()->json('succesfull delete', 200);
    }
}
