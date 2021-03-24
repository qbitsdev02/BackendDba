<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;
use App\Helpers\RoleAcronym;

class SellerController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/sellers",
    *     summary="Show sellers",
    *     tags={"Seller"},
    *     @OA\Response(
    *         response=200,
    *         description="Show sellers all."
    *     ),
    *   @OA\Parameter(
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
    *   ),
    *   @OA\Parameter(
    *       name="sortField",
    *       in="query",
    *       description="Seller resource name",
    *       required=false,
    *       @OA\Schema(
    *           type="string",
    *           example="id",
    *           description="The unique identifier of a Seller resource"
    *       )
    *    ),
    *   @OA\Parameter(
    *       name="sortOrder",
    *       in="query",
    *       description="Seller resource name",
    *       required=false,
    *       @OA\Schema(
    *           type="string",
    *           example="desc",
    *           description="The unique identifier of a Seller resource"
    *       )
    *    ),
    *   @OA\Parameter(
    *       name="perPage",
    *       in="query",
    *       description="Sort order field",
    *       @OA\Schema(
    *           title="perPage",
    *           type="number",
    *           default="10",
    *           description="The unique identifier of a Seller resource"
    *       )
    *    ),
    *   @OA\Parameter(
    *       name="dataSearch",
    *       in="query",
    *       description="Seller resource name",
    *       required=false,
    *       @OA\Schema(
    *           type="string",
    *           description="Search data"
    *       )
    *    ),
    *   @OA\Parameter(
    *       name="dataFilter",
    *       in="query",
    *       description="Seller resource name",
    *       required=false,
    *       @OA\Schema(
    *           type="string",
    *           description="The unique identifier of a Seller resource"
    *       )
    *    ),
    *     @OA\Response(
    *         response="default",
    *         description="error."
    *     )
    * )
    */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sellers = Seller::filters($request->all())
            ->ofType(RoleAcronym::SELLER)
            ->search($request->all());

        return response()->json($sellers, 200);
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
        *   path="/api/sellers",
        *   summary="Creates a new Seller",
        *   description="Creates a new Seller",
        *   tags={"Seller"},
        *   security={{"passport": {"*"}}},
        *   @OA\RequestBody(
        *       @OA\MediaType(
        *           mediaType="application/json",
        *           @OA\Schema(ref="#/components/schemas/Seller")
        *       )
        *   ),
        *   @OA\Response(
        *       @OA\MediaType(mediaType="application/json"),
        *       response=200,
        *       description="The Seller resource created",
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
        $seller = new Seller();
        $seller->name = $request->name;
        $seller->last_name = $request->last_name;
        $seller->email = $request->email;
        $seller->phone = $request->phone;
        $seller->document_type_id = $request->document_type_id;
        $seller->document_number = $request->document_number;
        $seller->user_created_id = $request->user_created_id;
        $seller->save();
        return response()->json($seller, 201);
    }
    /**
     * @OA\Get(
     *      path="/api/sellers/{id}",
     *      operationId="getSellerById",
     *      tags={"Seller"},
     *      summary="Get Seller information",
     *      description="Returns Seller data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Seller id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Seller")
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
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function show(Seller $seller)
    {
        return response()->json($seller, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function edit(Seller $seller)
    {
        //
    }
    /**
     * @OA\Put(
     *      path="/api/sellers/{id}",
     *      operationId="updateSeller",
     *      tags={"Seller"},
     *      summary="Update existing Seller",
     *      description="Returns updated Seller data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Seller id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Seller")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Seller")
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
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seller $seller)
    {
        $seller->name = $request->name;
        $seller->last_name = $request->last_name;
        $seller->email = $request->email;
        $seller->phone = $request->phone;
        $seller->document_type_id = $request->document_type_id;
        $seller->document_number = $request->document_number;
        $seller->user_updated_id = $request->user_updated_id;
        $seller->update();
        return response()->json($seller, 200);
    }
    /**
     * @OA\Delete(
     *      path="/api/sellers/{id}",
     *      operationId="deleteSeller",
     *      tags={"Seller"},
     *      summary="Delete existing Seller",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Seller id",
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
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller)
    {
        $seller->delete();
        return response()->json('succesfull delete', 200);
    }
}
