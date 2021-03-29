<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Helpers\RoleAcronym;

class ClientController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/clients",
    *     summary="Show clients",
    *     tags={"Client"},
    *     @OA\Response(
    *         response=200,
    *         description="Show clients all."
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
    *       description="client resource name",
    *       required=false,
    *       @OA\Schema(
    *           type="string",
    *           example="id",
    *           description="The unique identifier of a client resource"
    *       )
    *    ),
    *   @OA\Parameter(
    *       name="sortOrder",
    *       in="query",
    *       description="client resource name",
    *       required=false,
    *       @OA\Schema(
    *           type="string",
    *           example="desc",
    *           description="The unique identifier of a client resource"
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
    *           description="The unique identifier of a client resource"
    *       )
    *    ),
    *   @OA\Parameter(
    *       name="dataSearch",
    *       in="query",
    *       description="client resource name",
    *       required=false,
    *       @OA\Schema(
    *           type="string",
    *           description="Search data"
    *       )
    *    ),
    *   @OA\Parameter(
    *       name="dataFilter",
    *       in="query",
    *       description="client resource name",
    *       required=false,
    *       @OA\Schema(
    *           type="string",
    *           description="The unique identifier of a client resource"
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
        $clients = Client::filters($request->all())
            ->ofType(RoleAcronym::CLIENT)
            ->search($request->all());

        return response()->json($clients, 200);
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
        *   path="/api/clients",
        *   summary="Creates a new client",
        *   description="Creates a new client",
        *   tags={"Client"},
        *   security={{"passport": {"*"}}},
        *   @OA\RequestBody(
        *       @OA\MediaType(
        *           mediaType="application/json",
        *           @OA\Schema(ref="#/components/schemas/Client")
        *       )
        *   ),
        *   @OA\Response(
        *       @OA\MediaType(mediaType="application/json"),
        *       response=200,
        *       description="The CLient resource created",
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
        $client = new Client();
        $client->name = $request->name;
        $client->last_name = $request->last_name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->document_type_id = $request->document_type_id;
        $client->document_number = $request->document_number;
        $client->phone_contact = $request->phone_contact;
        $client->full_name_contact = $request->full_name_contact;
        $client->client_type_id = $request->client_type_id;
        $client->user_created_id = $request->user_created_id;
        $client->save();
        return response()->json($client, 201);
    }
    /**
     * @OA\Get(
     *      path="/api/clients/{id}",
     *      operationId="getClientById",
     *      tags={"Client"},
     *      summary="Get Client information",
     *      description="Returns Client data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Client id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Client")
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
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return response()->json($client, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }
    /**
     * @OA\Put(
     *      path="/api/clients/{id}",
     *      operationId="updateClient",
     *      tags={"Client"},
     *      summary="Update existing Client",
     *      description="Returns updated Client data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Client id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Client")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Client")
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
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $client->name = $request->name;
        $client->last_name = $request->last_name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->document_type_id = $request->document_type_id;
        $client->document_number = $request-document_number;
        $client->phone_contact = $request->phone_contact;
        $client->full_name_contact = $request->full_name_contact;
        $client->client_type_id = $request->client_type_id;
        $client->user_updated_id = $request->user_updated_id;
        $client->update();
        return response()->json($client, 200);
    }
    /**
     * @OA\Delete(
     *      path="/api/clients/{id}",
     *      operationId="deleteClient",
     *      tags={"Client"},
     *      summary="Delete existing Client",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Client id",
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
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return response()->json('succesfull delete', 200);
    }
}
