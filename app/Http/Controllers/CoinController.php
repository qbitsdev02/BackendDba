<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use App\Http\Requests\StoreCoinRequest;
use App\Http\Requests\UpdateCoinRequest;
use Illuminate\Http\Request;

class CoinController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Coin::class, 'coin');
    }

    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      * @OA\Get(
      *     path="/coins",
      *     operationId="getCoin",
      *     tags={"Coin"},
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
      *         description="Show Coins all."
      *     ),
      *     @OA\Response(
      *         response="default",
      *         description="error."
      *     )
      *  )
      */
    public function index(Request $request)
    {
        $coins = Coin::filters($request->all())->search($request->all());
        return response()->json($coins, 200);
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
      * Store a newly created resource in storage.
      *
      * @param  \App\Http\Requests\StoreCoinRequest  $request
      * @return \Illuminate\Http\Response
      * @OA\Post(
      *   path="/coins",
      *   summary="Creates a new Coin",
      *   description="Creates a new Coin",
      *   tags={"Coin"},
      *   security={{"passport": {"*"}}},
      *   @OA\RequestBody(
      *       @OA\MediaType(
      *           mediaType="application/json",
      *           @OA\Schema(ref="#/components/schemas/Coin")
      *       )
      *   ),
      *   @OA\Response(
      *       @OA\MediaType(mediaType="application/json"),
      *       response=200,
      *       description="The Coin resource created",
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
    public function store(StoreCoinRequest $request)
    {
        $coin = new Coin();
        $coin->name = $request->name;
        $coin->symbol = $request->symbol;
        $coin->user_created_id = $request->user_created_id;
        $coin->save();
        return response()->json($coin, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coin  $coin
     * @return \Illuminate\Http\Response
     * @OA\Get(
     *   path="/coins/{id}",
     *   operationId="getCoinById",
     *   tags={"Coin"},
     *   summary="Get Coin information",
     *   description="Returns Coin data",
     *   @OA\Parameter(
     *      name="id",
     *      description="Coin id",
     *      required=true,
     *      in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Coin")
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
    public function show(Coin $coin)
    {
        return response($coin, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coin  $coin
     * @return \Illuminate\Http\Response
     */
    public function edit(Coin $coin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * @param  \App\Http\Requests\UpdateCoinRequest  $request
     * @param  \App\Models\Coin  $coin
     * @return \Illuminate\Http\Response
     * @OA\Put(
     *  path="/coins/{id}",
     *  operationId="updateCoin",
     *  tags={"Coin"},
     *  summary="Update existing Coin",
     *  description="Returns updated Coin data",
     *  @OA\Parameter(
     *      name="id",
     *      description="Coin id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Coin")
     *   ),
     *   @OA\Response(
     *      response=202,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/Coin")
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
    public function update(UpdateCoinRequest $request, Coin $coin)
    {
        $coin->name = $request->name;
        $coin->symbol = $request->symbol;
        $coin->user_created_id = $request->user_created_id;
        $coin->update();
        return response()->json($coin, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coin  $coin
     * @return \Illuminate\Http\Response
     * @OA\Delete(
     *  path="/coins/{id}",
     *  operationId="deleteCoin",
     *  tags={"Coin"},
     *  summary="Delete existing Coin",
     *  description="Deletes a record and returns no content",
     *  @OA\Parameter(
     *      name="id",
     *      description="Coin id",
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
    public function destroy(Coin $coin)
    {
        $coin->delete();
        return response('the data was deleted successfully', 200);
    }
}
