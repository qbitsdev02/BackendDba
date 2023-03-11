<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRateRequest;
use App\Http\Requests\UpdateRateRequest;
use App\Http\Resources\RateResource;
use Illuminate\Http\Request;

class RateController extends Controller
{

    /**
     * Create the controller instance to Authorizing Resource Controller.
     *
     * You may make use of the (authorizeResource) method in your controller's constructor.
     * This method will attach the appropriate can middleware definitions to the resource controller's methods.
     */
    public function __construct()
    {
        $this->authorizeResource(Rate::class, 'rate');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
      *     path="/rates",
      *     operationId="getrate",
      *     tags={"Rate"},
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
      *         description="rate all."
      *     ),
      *     @OA\Response(
      *         response="default",
      *         description="error."
      *     )
      *  )
     */
    public function index(Request $request)
    {
        $rates = Rate::filters($request->all())
            ->search($request->all());

        return (RateResource::collection($rates)->additional(
            [
                'message' => 'successully response'
            ],200)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRateRequest  $request
     * @return \Illuminate\Http\Response
     *
     * @OA\Post(
     *   path="/rates",
     *   summary="Creates a new rate",
     *   description="Creates a new rate",
     *   tags={"Rate"},
     *   security={{"passport": {"*"}}},
     *   @OA\RequestBody(
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/Rate")
     *       )
     *   ),
     *   @OA\Response(
     *       @OA\MediaType(mediaType="application/json"),
     *       response=200,
     *       description="The Provider resource created",
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
    public function store(StoreRateRequest $request)
    {
        $rate = new Rate();
        $rate->rate = $request->rate;
        $rate->description = $request->description;
        $rate->provider_id = $request->provider_id;
        $rate->coin_id = $request->coin_id;
        $rate->unit_of_measurement_id = $request->unit_of_measurement_id;
        $rate->user_created_id = $request->user_created_id;

        $rate->save();

        return (new RateResource($rate))->additional(
            [
            "message" => "successfully registerd rate"
            ],200
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rate  rate
     * @return \Illuminate\Http\Response
     *
     *
     * @OA\Get(
     *      path="/rates/{id}",
     *      operationId="getrateId",
     *      tags={"Rate"},
     *      summary="Get rate information",
     *      description="Returns providers data",
     *   @OA\Parameter(
     *          name="id",
     *          description="rate id",
     *          required=true,
     *          in="path",
     *             @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Rate")
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
    public function show(Rate $rate)
    {
        return (new RateResource($rate))->additional(
                [
                    'message:' => 'successfully response.'
                ],200
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRateRequest  $request
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     *
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     *
     * @OA\Put(
     *      path="/rates/{id}",
     *      operationId="updaterate",
     *      tags={"Rate"},
     *      summary="Update existing rate",
     *      description="Returns updated rate data",
     *  @OA\Parameter(
     *      name="id",
     *      description="rate id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Rate")
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/Rate")
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
    public function update(UpdateRateRequest $request, Rate $rate)
    {
        $rate->rate = $request->rate;
        $rate->description = $request->description;
        $rate->provider_id = $request->provider_id;
        $rate->unit_of_measurement_id = $request->unit_of_measurement_id;
        $rate->user_update_id = $request->user_update_id;

        $rate->update();

        return (new RateResource($rate))->additional(
            [
                "message" => "successfully updated rate"
            ],200
        );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     *
     *Remove the specified resource from storage.
     *
     * @OA\Delete(
     *  path="/rates/{id}",
     *  operationId="deleterate",
     *  tags={"Rate"},
     *  summary="Delete existing provider",
     *  description="Deletes a record and returns no content",
     *  @OA\Parameter(
     *      name="id",
     *      description="rate id",
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
     *
     */
    public function destroy(Rate $rate)
    {
        $rate->delete();

        return response()->json(
            [
                'message' => 'the data was delete successfully'
            ],200
        );
    }
}
