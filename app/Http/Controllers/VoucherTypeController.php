<?php

namespace App\Http\Controllers;

use App\Models\VoucherType;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVoucherTypeRequest;
use App\Http\Requests\UpdateVoucherTypeRequest;
use App\Http\Resources\VoucherTypeResource;
use Illuminate\Http\Request;

class VoucherTypeController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(VoucherType::class, 'voucher_type');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/voucher-types",
     *     operationId="getvoucher-type",
     *     tags={"VoucherType"},
     *     @OA\Parameter(
     *       name="paginate",
     *       in="query",
     *       description="paginate",
     *       required=false,
     *       @OA\Schema(
     *           title="Paginate",
     *           example="true",
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
     *         description=" all register."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="error."
     *     )
     *  )
     */
    public function index(Request $request)
    {
        $voucherTypes = VoucherType::filters($request->all())
            ->search($request->all());
        return (VoucherTypeResource::collection($voucherTypes)->additional(
            [
                'message' => 'successfully response'
            ]
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVoucherTypeRequest  $request
     * @return \Illuminate\Http\Response
     * 
     * @OA\Post(
     *   path="/voucher-types",
     *   summary="Creates a new register",
     *   description="Creates a new register",
     *   tags={"VoucherType"},
     *   security={{"passport": {"*"}}},
     *   @OA\RequestBody(
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/VoucherType")
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
    public function store(StoreVoucherTypeRequest $request)
    {
        $voucherType = new VoucherType();
        $voucherType->name = $request->name;
        $voucherType->description = $request->description;
        $voucherType->series_name = $request->series_name;
        $voucherType->user_created_id = $request->user_created_id;
        $voucherType->save();

        return (new VoucherTypeResource($voucherType))->additional(
            [
                'message:' => 'successfully registered data'
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VoucherType  $voucherType
     * @return \Illuminate\Http\Response
     * 
     * @OA\Get(
     *      path="/voucher-types/{id}",
     *      operationId="getvoucher-typesById",
     *      tags={"VoucherType"},
     *      summary="Get register information",
     *      description="Returns  data",
     *   @OA\Parameter(
     *          name="id",
     *          description="Register id",
     *          required=true,
     *          in="path",
     *             @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/VoucherType")
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
    public function show(VoucherType $voucherType)
    {
        return (new VoucherTypeResource($voucherType))->additional(
            [
                'message:' => 'successfully response'
            ],
            200
        );
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVoucherTypeRequest  $request
     * @param  \App\Models\VoucherType  $voucherType
     * @return \Illuminate\Http\Response
     * 
     * @OA\Put(
     *      path="/voucher-types/{id}",
     *      operationId="updatevoucher-type",
     *      tags={"VoucherType"},
     *      summary="Update existing register",
     *      description="Returns updated register ",
     *  @OA\Parameter(
     *      name="id",
     *      description="Register id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/VoucherType")
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/VoucherType")
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
    public function update(UpdateVoucherTypeRequest $request, VoucherType $voucherType)
    {
        $voucherType->name = $request->name;
        $voucherType->description = $request->description;
        $voucherType->series_name = $request->series_name;
        $voucherType->user_created_id = $request->user_created_id;
        $voucherType->update();

        return (new VoucherTypeResource($voucherType))->additional(
            [
                'message:' => 'successfully updated data'
            ],
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VoucherType  $voucherType
     * @return \Illuminate\Http\Response
     * 
     * @OA\Delete(
     *  path="/voucher-types/{id}",
     *  operationId="deletevoucher-types",
     *  tags={"VoucherType"},
     *  summary="Delete existing register",
     *  description="Deletes a record and returns no content",
     *  @OA\Parameter(
     *      name="id",
     *      description="Register id",
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
    public function destroy(VoucherType $voucherType)
    {
        $voucherType->delete();
        return response()->json(
            [
                'message' => 'the data was deleted successfully'
            ],
            200
        );
    }
}
