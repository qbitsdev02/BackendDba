<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Helpers\RoleAcronym;
use App\Models\Provider;

class ProviderController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/providers",
    *     summary="Show providers",
    *     tags={"Provider"},
    *     @OA\Response(
    *         response=200,
    *         description="Show providers all."
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
    *       description="Provider resource name",
    *       required=false,
    *       @OA\Schema(
    *           type="string",
    *           example="id",
    *           description="The unique identifier of a Provider resource"
    *       )
    *    ),
    *   @OA\Parameter(
    *       name="sortOrder",
    *       in="query",
    *       description="Provider resource name",
    *       required=false,
    *       @OA\Schema(
    *           type="string",
    *           example="desc",
    *           description="The unique identifier of a Provider resource"
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
    *           description="The unique identifier of a Provider resource"
    *       )
    *    ),
    *   @OA\Parameter(
    *       name="dataSearch",
    *       in="query",
    *       description="Provider resource name",
    *       required=false,
    *       @OA\Schema(
    *           type="string",
    *           description="Search data"
    *       )
    *    ),
    *   @OA\Parameter(
    *       name="dataFilter",
    *       in="query",
    *       description="Provider resource name",
    *       required=false,
    *       @OA\Schema(
    *           type="string",
    *           description="The unique identifier of a Provider resource"
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
        $providers = Provider::filters($request->all())
            ->ofType(RoleAcronym::PROVIDER)
            ->search($request->all());

        return response()->json($providers, 200);
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
        *   path="/api/providers",
        *   summary="Creates a new Provider",
        *   description="Creates a new Provider",
        *   tags={"Provider"},
        *   security={{"passport": {"*"}}},
        *   @OA\RequestBody(
        *       @OA\MediaType(
        *           mediaType="application/json",
        *           @OA\Schema(ref="#/components/schemas/Provider")
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
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $provider = new Provider();
        $provider->name = $request->name;
        $provider->last_name = $request->last_name;
        $provider->email = $request->email;
        $provider->phone = $request->phone;
        $provider->residence_condition = $request->residence_condition;
        $provider->address = $request->address;
        $provider->province = $request->province;
        $provider->district = $request->district;
        $provider->full_address = $request->full_address;
        $provider->document_type_id = $request->document_type_id;
        $provider->document_number = $request->document_number;
        $provider->phone_contact = $request->phone_contact;
        $provider->full_name_contact = $request->full_name_contact;
        $provider->user_created_id = $request->user_created_id;
        $provider->save();
        return response()->json($provider, 201);
    }
    /**
     * @OA\Get(
     *      path="/api/providers/{id}",
     *      operationId="getProviderById",
     *      tags={"Provider"},
     *      summary="Get Provider information",
     *      description="Returns Provider data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Provider id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Provider")
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
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        return response()->json($provider, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        //
    }
    /**
     * @OA\Put(
     *      path="/api/providers/{id}",
     *      operationId="updateProvider",
     *      tags={"Provider"},
     *      summary="Update existing Provider",
     *      description="Returns updated Provider data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Provider id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Provider")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Provider")
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
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        $provider->name = $request->name;
        $provider->last_name = $request->last_name;
        $provider->email = $request->email;
        $provider->phone = $request->phone;
        $provider->address = $request->address;
        $provider->province = $request->province;
        $provider->district = $request->district;
        $provider->full_address = $request->full_address;
        $provider->residence_condition = $request->residence_condition;
        $provider->document_type_id = $request->document_type_id;
        $provider->document_number = $request->document_number;
        $provider->phone_contact = $request->phone_contact;
        $provider->full_name_contact = $request->full_name_contact;
        $provider->user_updated_id = $request->user_updated_id;
        $provider->update();
        return response()->json($provider, 200);
    }
    /**
     * @OA\Delete(
     *      path="/api/providers/{id}",
     *      operationId="deleteProvider",
     *      tags={"Provider"},
     *      summary="Delete existing Provider",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Provider id",
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
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();
        return response()->json('succesfull delete', 200);
    }
}
