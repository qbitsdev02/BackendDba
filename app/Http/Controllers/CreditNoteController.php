<?php

namespace App\Http\Controllers;

use App\Models\BillElectronic;
use App\Models\CreditNote;
use Illuminate\Http\Request;

class CreditNoteController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/bill-electronic/{id}/note",
     *      tags={"CreditNote"},
     *      summary="Get Bill electronic information",
     *      description="Returns Bill electronic data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Bill electronic id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/CreditNote")
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        return BillElectronic::select(
            'id',
            'client_id',
            'coin_id'
        )
        ->without(
            'billElectronicPayments',
            'billElectronicGuides',
            'serie',
            'CreditNote',
            'voucherType',
            'branchOffice',
            'seller'
        )
        ->with(
            'creditNote'
        )
        ->findOrFail($id);
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
     *      path="/api/bill-electronic/{id}/note",
     *      operationId="updateCreditNote",
     *      tags={"CreditNote"},
     *      summary="Update existing CreditNote",
     *      description="Returns updated CreditNote data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Bill electronic id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/CreditNote")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/CreditNote")
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $creditNote = CreditNote::updateOrCreate(
            [
                'bill_electronic_id' => $id,
            ],
            [
                'seller_id' => $request->seller_id,
                'voucher_type_note_id' => $request->voucher_type_note_id,
                'type_of_credit_note_id' => $request->type_of_credit_note_id,
                'description' => $request->description,
                'purchase_order' => $request->purchase_order,
                'exchange_rate' => $request->exchange_rate,
                'user_created_id' => $request->user_created_id
            ]
        );
        
        $creditNote
            ->creditNoteDetails()
            ->createMany($request->credit_note_details);

        return response()->json($creditNote, 201);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CreditNote  $creditNote
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CreditNote  $creditNote
     * @return \Illuminate\Http\Response
     */
    public function edit(CreditNote $creditNote)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CreditNote  $creditNote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CreditNote  $creditNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(CreditNote $creditNote)
    {
        //
    }
}
