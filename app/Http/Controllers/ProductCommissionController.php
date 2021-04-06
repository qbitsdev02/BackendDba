<?php

namespace App\Http\Controllers;

use App\Models\ProductCommission;
use Illuminate\Http\Request;

class ProductCommissionController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/product-commissions",
    *     summary="Show ProductCommissions",
    *     tags={"ProductCommission"},
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
    *         description="Show ProductCommission all."
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
        $productCommissions = ProductCommission::filters($request->all())->search($request->all());
        return response()->json($productCommissions, 200);
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
        *   path="/api/product-commissions",
        *   summary="Creates a new user",
        *   description="Creates a new user",
        *   tags={"ProductCommission"},
        *   security={{"passport": {"*"}}},
        *   @OA\RequestBody(
        *       @OA\MediaType(
        *           mediaType="application/json",
        *           @OA\Schema(ref="#/components/schemas/ProductCommission")
        *       )
        *   ),
        *   @OA\Response(
        *       @OA\MediaType(mediaType="application/json"),
        *       response=200,
        *       description="The ProductCommission resource created",
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
        $productCommission = new ProductCommission();
        $productCommission->product_id = $request->product_id;
        $productCommission->commission_type = $request->commission_type;
        $productCommission->amount = $request->amount;
        $productCommission->user_created_id = $request->user_created_id;
        $productCommission->save();
        return response()->json($productCommission, 201);
    }
    /**
     * @OA\Get(
     *      path="/api/product-commissions/{id}",
     *      operationId="getUserById",
     *      tags={"ProductCommission"},
     *      summary="Get ProductCommission information",
     *      description="Returns ProductCommission data",
     *      @OA\Parameter(
     *          name="id",
     *          description="ProductCommission id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/ProductCommission")
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
    public function show(ProductCommission $productCommission)
    {
        return response()->json($productCommission, 201);
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
     *      path="/api/product-commissions/{id}",
     *      operationId="updateProductCommission",
     *      tags={"ProductCommission"},
     *      summary="Update existing ProductCommission",
     *      description="Returns updated ProductCommission data",
     *      @OA\Parameter(
     *          name="id",
     *          description="ProductCommission id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/ProductCommission")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/ProductCommission")
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
    public function update(Request $request, ProductCommission $productCommission)
    {
        $productCommission->product_id = $request->product_id;
        $productCommission->commission_type = $request->commission_type;
        $productCommission->amount = $request->amount;
        $productCommission->user_updated_id = $request->user_updated_id;
        $productCommission->update();
        return response()->json($productCommission, 200);
    }
    /**
     * @OA\Delete(
     *      path="/api/product-commissions/{id}",
     *      operationId="deleteProject",
     *      tags={"ProductCommission"},
     *      summary="Delete existing ProductCommission",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="ProductCommission id",
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
    public function destroy(ProductCommission $productCommission)
    {
        $productCommission->delete();
        return response()->json('succesfull delete', 200);
    }
}
