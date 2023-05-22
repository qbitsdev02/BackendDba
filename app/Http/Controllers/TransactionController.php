<?php

namespace App\Http\Controllers;

use App\Events\RealTimeMessage;
use App\Events\Test;
use App\Events\TransactionEvent;
use App\Models\Transaction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Models\User;
use App\Notifications\TransactionNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class TransactionController extends Controller
{
    /**
     *
     */
    public function __construct()
    {
        $this->authorizeResource(Transaction::class, 'transaction');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/transactions",
     *     operationId="gettransaction",
     *     tags={"Transaction"},
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
     *         description="transaction all."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="error."
     *     )
     *  )
     */
    public function index(Request $request)
    {
        $transactions = Transaction::filters($request->all())
            ->search($request->all());

        return (TransactionResource::collection($transactions))->additional(
            [
                'message:' => 'Successfully response'
            ],
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     *
     *  @OA\Post(
     *   path="/transactions",
     *   summary="Creates a new transaction",
     *   description="Creates a new transaction",
     *   tags={"Transaction"},
     *   security={{"passport": {"*"}}},
     *   @OA\RequestBody(
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/Transaction")
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
    public function store(StoreTransactionRequest $request)
    {

        $transaction = new Transaction();
        $transaction->amount = $request->amount;
        $transaction->description = $request->description;
        $transaction->transactionable_type = $request->transactionable_type;
        $transaction->transactionable_id = $request->transactionable_id;
        $transaction->concept_id = $request->concept_id;
        $transaction->branch_office_id = $request->branch_office_id;
        $transaction->responsable_id = $request->responsable_id;
        $transaction->date = $request->date;
        $transaction->payment_order_id = $request->payment_order_id;
        $transaction->reference = $request->reference;
        $transaction->user_created_id = $request->user_created_id;

        $transaction->save();
        return (new TransactionResource($transaction))->additional(
            [
                'message:' => 'successfully registered data'
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *      path="/transactions/{id}",
     *      operationId="gettransactionById",
     *      tags={"Transaction"},
     *      summary="Get transaction information",
     *      description="Returns transaction data",
     *   @OA\Parameter(
     *          name="id",
     *          description="transaction id",
     *          required=true,
     *          in="path",
     *             @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Transaction")
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
    public function show(Transaction $transaction)
    {
        return (new TransactionResource($transaction))->additional(
            [
                'message:' => 'successfully response'
            ],
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     *
     * @OA\Put(
     *      path="/transactions/{id}",
     *      operationId="updatetransaction",
     *      tags={"Transaction"},
     *      summary="Update existing transaction",
     *      description="Returns updated port data",
     *  @OA\Parameter(
     *      name="id",
     *      description="transaction id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/Transaction")
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/Transaction")
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
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        $transaction->amount = $request->amount;
        $transaction->description = $request->description;
        $transaction->transactionable_type = $request->transactionable_type;
        $transaction->transactionable_id = $request->transactionable_id;
        $transaction->concept_id = $request->concept_id;
        $transaction->branch_office_id = $request->branch_office_id;
        $transaction->responsable_id = $request->responsable_id;
        $transaction->date = $request->date;
        $transaction->payment_order_id = $request->payment_order_id;
        $transaction->reference = $request->reference;
        $transaction->user_created_id = $request->user_created_id;

        $transaction->update();
        return (new TransactionResource($transaction))->additional(
            [
                'message:' => 'successfully updated data'
            ],
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     *
     * @OA\Delete(
     *  path="/transactions/{id}",
     *  operationId="deletetransaction",
     *  tags={"Transaction"},
     *  summary="Delete existing transaction",
     *  description="Deletes a record and returns no content",
     *  @OA\Parameter(
     *      name="id",
     *      description="transaction id",
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
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return response()->json(
            [
                'message' => 'the data was deleted successfully'
            ],
            200
        );
    }
}
