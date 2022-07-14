<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Http\Resources\TicketRosource;
use App\Policies\TicketPolicy;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Js;

class TicketController extends Controller
{

      /**
     * Create the controller instance to Authorizing Resource Controller.
     *  
     * You may make use of the (authorizeResource) method in your controller's constructor. 
     * This method will attach the appropriate can middleware definitions to the resource controller's methods.
     */
    public function __construct(){
        $this->authorizeResource(Ticket::class, 'ticket');   
    }

    
    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      *
      * @OA\Get(
      *     path="/tickets",
      *     operationId="getticket",
      *     tags={"Ticket"},
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
      *         description="ticket all."
      *     ),
      *     @OA\Response(
      *         response="default",
      *         description="error."
      *     )
      *  )
      */
    public function index(HttpRequest $request)
    {
        $tickets = Ticket::filters($request->all())
            ->search($request->all());

        
        return (TicketRosource::collection($tickets))->additional(
            [
                "message" => "successfully response"
            ],200
        );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTicketRequest  $request
     * @return \Illuminate\Http\Response
     * 
     * @OA\Post(
     *   path="/tickets",
     *   summary="Creates a new ticket",
     *   description="Creates a new ticket",
     *   tags={"Ticket"},
     *   security={{"passport": {"*"}}},
     *   @OA\RequestBody(
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/Ticket")
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
    public function store(StoreTicketRequest $request)
    {
        $ticket = new Ticket();
        $ticket->provider_id = $request->provider_id;
        $ticket->field_id = $request->field_id;
        $ticket->guide_id = $request->guide_id;
        $ticket->tare_weight = $request->tare_weight;
        $ticket->gross_weight = $request->gross_weight;
        $ticket->tare = $request->tare;
        $ticket->vehicle_number = $request->vehicle_number;
        $ticket->certificate = $request->certificate;
        $ticket->start_date = $request->start_date;
        $ticket->final_date = $request->final_date;
        $ticket->checkweighing = $request->checkweighing;
        $ticket->client_id = $request->client_id;
        $ticket->user_created_id = $request->user_created_id;

        $ticket->save();
        
        return (new TicketRosource($ticket))->additional(
            [
                "message" => " successfully registerd ticket "
            ],200
        ); 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tickect  rate
     * @return \Illuminate\Http\Response
     * 
     * 
     * @OA\Get(
     *      path="/tickets/{id}",
     *      operationId="getticketId",
     *      tags={"Ticket"},
     *      summary="Get ticket information",
     *      description="Returns ticket data",
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
     *          @OA\JsonContent(ref="#/components/schemas/Ticket")
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
    public function show(Ticket $ticket)
    {
        return (new TicketRosource($ticket))->additional(
            [
                "message" => "successfully response"
            ],200
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTicketRequest  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $ticket->provider_id = $request->provider_id;
        $ticket->field_id = $request->field_id;
        $ticket->guide_id = $request->guide_id;
        $ticket->tare_weight = $request->tare_weight;
        $ticket->gross_weight = $request->gross_weight;
        $ticket->tare = $request->tare;
        $ticket->vehicle_number = $request->vehicle_number;
        $ticket->certificate = $request->certificate;
        $ticket->start_date = $request->start_date;
        $ticket->final_date = $request->final_date;
        $ticket->checkweighing = $request->checkweighing;
        $ticket->client_id = $request->client_id;
        $ticket->user_created_id = $request->user_created_id;

        $ticket->update();

        return (new TicketRosource($ticket))->additional(
            [
                "message" => "successfully updated ticket"
            ],200
        );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     * 
     *Remove the specified resource from storage.
     * 
     * @OA\Delete(
     *  path="/tickets/{id}",
     *  operationId="deleteticket",
     *  tags={"Ticket"},
     *  summary="Delete existing ticket",
     *  description="Deletes a record and returns no content",
     *  @OA\Parameter(
     *      name="id",
     *      description="ticket id",
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
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return response()->json(
            [
                "messasge" => "data was delete successfully"
            ],200
        );
    }
}
