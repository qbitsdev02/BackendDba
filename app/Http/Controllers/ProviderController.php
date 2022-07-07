<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProviderRequest;
use App\Http\Requests\UpdateProviderRequest;
use App\Http\Resources\ProviderResource;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
      /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      * @OA\Get(
      *     path="/providers",
      *     operationId="getprovider",
      *     tags={"provider"},
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
      *         description="Providers all."
      *     ),
      *     @OA\Response(
      *         response="default",
      *         description="error."
      *     )
      *  )
      */
    public function index(Request $request)
    {
        $providers = Provider::filters($request->all())
            ->search($request->all());
            
        return  ProviderResource::collection($providers);
    }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \App\Http\Requests\StoreProvidersRequest  $request
      * @return \Illuminate\Http\Response
      * @OA\Post(
      *   path="/providers",
      *   summary="Creates a new providers",
      *   description="Creates a new providers,
      *   tags={"providers"},
      *   security={{"passport": {"*"}}},
      *   @OA\RequestBody(
      *       @OA\MediaType(
      *           mediaType="application/json",
      *           @OA\Schema(ref="#/components/schemas/providers")
      *       )
      *   ),
      *   @OA\Response(
      *       @OA\MediaType(mediaType="application/json"),
      *       response=200,
      *       description="The MaterialSupplier resource created",
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
    public function store(StoreProviderRequest $request)
    {
        $provider = new Provider();
        $provider->name = $request->name;
        $provider->seal = $request->seal;
        $provider->logo = $request->logo;
        $provider->serie_number = $request->serie_number;
        $provider->signature = $request->signature;
        $provider->document_number = $request->document_number;
        $provider->address = $request->address;
        $provider->email = $request->email;
        $provider->material_supplier_type_id = $request->material_supplier_type_id;
        $provider->phone_number = $request->phone_number;
        $provider->user_created_id = $request->user_created_id;
        
        $provider->save();

        return response([
            'provider' => new ProviderResource($provider),
            'message' => 'Provider registered successfully.'
        ],201);
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MaterialSupplier  $materialSupplier
     * @return \Illuminate\Http\Response
     * 
     * 
     * @OA\Get(
     *   path="/providers/{id}",
     *   operationId="getprovidersById",
     *   tags={"providers"},
     *   summary="Get providers information",
     *   description="Returns providers data",
     *   @OA\Parameter(
     *      name="id",
     *      description="providers id",
     *      required=true,
     *      in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/providers")
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
    public function show(Provider $provider)
    {
        return response([
            new ProviderResource($provider)

        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     *
     * @OA\Put(
     *  path="/provider/{id}",
     *  operationId="updateprovider",
     *  tags={"provider"},
     *  summary="Update existing provider",
     *  description="Returns updated provider data",
     *  @OA\Parameter(
     *      name="id",
     *      description="provider id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/provider")
     *   ),
     *   @OA\Response(
     *      response=202,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/provider")
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
    public function update(UpdateProviderRequest $request, Provider $provider)
    {
        $provider->name = $request->name;
        $provider->seal = $request->seal;
        $provider->signature = $request->signature;
        $provider->address = $request->address;
        $provider->logo = $request->logo;
        $provider->document_number = $request->document_number;
        $provider->email = $request->email;
        $provider->serie_number = $request->serie_number;
        $provider->phone_number = $request->phone_number;
        $provider->provider_type_id = $request->provider_type_id;
        $provider->user_updated_id = $request->user_updated_id;

        $provider->update();

        return response([
            new ProviderResource($provider),
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     * 
     * @OA\Delete(
     *  path="/provider/{id}",
     *  operationId="deleteprovider",
     *  tags={"provider"},
     *  summary="Delete existing provider",
     *  description="Deletes a record and returns no content",
     *  @OA\Parameter(
     *      name="id",
     *      description="provider id",
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
    public function destroy( Provider $provider)
    {
        $provider->delete();
        return response([
            'message' => 'the data was deleted successfully'
        ],200);
    }
}
