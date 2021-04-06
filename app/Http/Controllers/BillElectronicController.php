<?php

namespace App\Http\Controllers;

use App\Models\BillElectronic;
use Illuminate\Http\Request;

class BillElectronicController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/bill-electronics",
     *     summary="Show bill electronics",
     *     tags={"BillElectronic"},
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
     *       description="BillElectronic resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="id",
     *           description="The unique identifier of a BillElectronic resource"
     *       )
     *     ),
     *     @OA\Parameter(
     *       name="sortOrder",
     *       in="query",
     *       description="BillElectronic resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="desc",
     *           description="The unique identifier of a BillElectronic resource"
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
     *           description="The unique identifier of a BillElectronic resource"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataSearch",
     *       in="query",
     *       description="BillElectronic resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="Search data"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataFilter",
     *       in="query",
     *       description="BillElectronic resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="The unique identifier of a BillElectronic resource"
     *       )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Show bill electronics all."
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
        $billElectronics = BillElectronic::filters($request->all())->search($request->all());
        return response()->json($billElectronics, 200);
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
     *   path="/api/bill-electronics",
     *   summary="Creates a new bill electronics",
     *   description="Creates a new bill electronics",
     *   tags={"BillElectronic"},
     *   security={{"passport": {"*"}}},
     *   @OA\RequestBody(
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/BillElectronic")
     *       )
     *   ),
     *   @OA\Response(
     *       @OA\MediaType(mediaType="application/json"),
     *       response=200,
     *       description="The BillElectronic resource created",
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
        $billElectronic = new BillElectronic();
        $billElectronic->serie_id = $request->serie_id;
        $billElectronic->client_id = $request->client_id;
        $billElectronic->voucher_type_id = $request->voucher_type_id;
        $billElectronic->branch_office_id = $request->branch_office_id;
        $billElectronic->operation_type_id = $request->operation_type_id;
        $billElectronic->seller_id = $request->seller_id;
        $billElectronic->igv = $request->igv;
        $billElectronic->coin_id = $request->coin_id;
        $billElectronic->exchange_rate = $request->exchange_rate;
        $billElectronic->created_at = $request->created_at;
        $billElectronic->expiration_date = $request->expiration_date;
        $billElectronic->user_created_id = $request->user_created_id;
        $billElectronic->save();
        return response()->json($billElectronic, 201);
    }
    /**
     * @OA\Get(
     *      path="/api/bill-electronics/{id}",
     *      tags={"BillElectronic"},
     *      summary="Get BillElectronic information",
     *      description="Returns BillElectronic data",
     *      @OA\Parameter(
     *          name="id",
     *          description="BillElectronic id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/BillElectronic")
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
     * @param  \App\Models\BillElectronic  $billElectronic
     * @return \Illuminate\Http\Response
     */
    public function show(BillElectronic $billElectronic)
    {
        return response()->json($billElectronic, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BillElectronic  $billElectronic
     * @return \Illuminate\Http\Response
     */
    public function edit(BillElectronic $billElectronic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BillElectronic  $billElectronic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BillElectronic $billElectronic)
    {
        //
    }
    /**
     * @OA\Delete(
     *      path="/api/bill-electronics/{id}",
     *      tags={"BillElectronic"},
     *      summary="Delete existing BillElectronic",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="BillElectronic id",
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
     * @param  \App\Models\BillElectronic  $billElectronic
     * @return \Illuminate\Http\Response
     */
    public function destroy(BillElectronic $billElectronic)
    {
        $billElectronic->delete();
        return response()->json("delete succefull", 200);
    }
}
