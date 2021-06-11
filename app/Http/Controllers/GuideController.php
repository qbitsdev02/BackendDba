<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/guides",
     *     summary="Show guide",
     *     tags={"Guide"},
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
     *       description="Guide resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="id",
     *           description="The unique identifier of a Guide resource"
     *       )
     *     ),
     *     @OA\Parameter(
     *       name="sortOrder",
     *       in="query",
     *       description="Guide resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="desc",
     *           description="The unique identifier of a Guide resource"
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
     *           description="The unique identifier of a Guide resource"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataSearch",
     *       in="query",
     *       description="Guide resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="Search data"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataFilter",
     *       in="query",
     *       description="Guide resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="The unique identifier of a Guide resource"
     *       )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Show guide all."
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
        $guides = Guide::filters($request->all())->search($request->all());
        return response()->json($guides, 200);
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
        *   path="/api/guides",
        *   summary="Creates a new guide",
        *   description="Creates a new guide",
        *   tags={"Guide"},
        *   security={{"passport": {"*"}}},
        *   @OA\RequestBody(
        *       @OA\MediaType(
        *           mediaType="application/json",
        *           @OA\Schema(ref="#/components/schemas/Guide")
        *       )
        *   ),
        *   @OA\Response(
        *       @OA\MediaType(mediaType="application/json"),
        *       response=200,
        *       description="The Guide resource created",
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
        $guide = new Guide();
        $guide->serie_id = $request->serie_id;
        $guide->date_of_issue = $request->date_of_issue;
        $guide->date_transfer = $request->date_transfer;
        $guide->total_packet = $request->total_packet;
        $guide->description = $request->description;
        $guide->branch_office_id = $request->branch_office_id;
        $guide->measurement_unit_id = $request->measurement_unit_id;
        $guide->transfer_mode_id = $request->transfer_mode_id;
        $guide->transfer_subject_id = $request->transfer_subject_id;
        $guide->client_id = $request->client_id;
        $guide->observation = $request->observation;
        $guide->from_country = $request->from_country;
        $guide->from_ubigeo = $request->from_ubigeo;
        $guide->from_address = $request->from_address;
        $guide->to_country = $request->to_country;
        $guide->to_ubigeo = $request->to_ubigeo;
        $guide->to_address = $request->to_address;
        $guide->carrier_document_type_id = $request->carrier_document_type_id;
        $guide->carrier_document_number = $request->carrier_document_number;
        $guide->plate_number = $request->plate_number;
        $guide->license_number = $request->license_number;
        $guide->semitrailer_number = $request->semitrailer_number;
        $guide->user_created_id = $request->user_created_id;
        $guide->user_updated_id = $request->user_updated_id;
        $guide->user_created_id = $request->user_created_id;
        $guide->save();
        return response()->json($guide, 201);
    }
    /**
     * @OA\Get(
     *      path="/api/guides/{id}",
     *      operationId="getGuideById",
     *      tags={"Guide"},
     *      summary="Get Guide information",
     *      description="Returns Guide data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Guide id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Guide")
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
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function show(Guide $guide)
    {
        return response()->json($guide, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function edit(Guide $guide)
    {
        //
    }
    /**
     * @OA\Put(
     *      path="/api/guides/{id}",
     *      operationId="updateGuide",
     *      tags={"Guide"},
     *      summary="Update existing Guide",
     *      description="Returns updated Guide data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Guide id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Guide")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Guide")
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
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guide $guide)
    {
        $guide->serie_id = $request->serie_id;
        $guide->date_of_issue = $request->date_of_issue;
        $guide->date_transfer = $request->date_transfer;
        $guide->total_packet = $request->total_packet;
        $guide->description = $request->description;
        $guide->branch_office_id = $request->branch_office_id;
        $guide->measurement_unit_id = $request->measurement_unit_id;
        $guide->transfer_mode_id = $request->transfer_mode_id;
        $guide->transfer_subject_id = $request->transfer_subject_id;
        $guide->client_id = $request->client_id;
        $guide->observation = $request->observation;
        $guide->from_country = $request->from_country;
        $guide->from_ubigeo = $request->from_ubigeo;
        $guide->from_address = $request->from_address;
        $guide->to_country = $request->to_country;
        $guide->to_ubigeo = $request->to_ubigeo;
        $guide->to_address = $request->to_address;
        $guide->carrier_document_type_id = $request->carrier_document_type_id;
        $guide->carrier_document_number = $request->carrier_document_number;
        $guide->plate_number = $request->plate_number;
        $guide->license_number = $request->license_number;
        $guide->semitrailer_number = $request->semitrailer_number;
        $guide->user_created_id = $request->user_created_id;
        $guide->user_updated_id = $request->user_updated_id;
        $guide->user_created_id = $request->user_created_id;
        $guide->update();
        return response()->json($guide, 200);
    }
    /**
     * @OA\Delete(
     *      path="/api/guides/{id}",
     *      operationId="deleteProject",
     *      tags={"Guide"},
     *      summary="Delete existing Guide",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Guide id",
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
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guide $guide)
    {
        $guide->delete();
        return response()->json('succesfull delete', 200);
    }
}
