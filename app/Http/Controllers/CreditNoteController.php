<?php

namespace App\Http\Controllers;

use App\Models\CreditNote;
use Illuminate\Http\Request;

class CreditNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * @OA\Get(
     *      path="/api/bill-electronic/{id}/note",
     *      tags={"CreditNote"},
     *      summary="Get CreditNote information",
     *      description="Returns CreditNote data",
     *      @OA\Parameter(
     *          name="id",
     *          description="CreditNote id",
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
     * Display the specified resource.
     *
     * @param  \App\Models\CreditNote  $creditNote
     * @return \Illuminate\Http\Response
     */
    public function show(CreditNote $creditNote)
    {
        return response()->json($creditNote, 200);
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
        $flight = CreditNote::updateOrCreate(
            ['bill_electronic_id', $id],
            ['price' => 99, 'discounted' => 1]
        );
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
