<?php

namespace App\Http\Controllers;

use App\Models\ExpenseReason;
use Illuminate\Http\Request;

class ExpenseReasonController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/expense-reasons",
     *     summary="Show ExpesneReason",
     *     tags={"ExpesneReason"},
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
     *       name="sortField",
     *       in="query",
     *       description="ExpesneReason resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="id",
     *           description="The unique identifier of a ExpesneReason resource"
     *       )
     *     ),
     *     @OA\Parameter(
     *       name="sortOrder",
     *       in="query",
     *       description="ExpesneReason resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="desc",
     *           description="The unique identifier of a ExpesneReason resource"
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
     *           description="The unique identifier of a ExpesneReason resource"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataSearch",
     *       in="query",
     *       description="ExpesneReason resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="Search data"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataFilter",
     *       in="query",
     *       description="ExpesneReason resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="The unique identifier of a ExpesneReason resource"
     *       )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Show ExpesneReason all."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="error."
     *     )
     *  )
    */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $expenseReasons = ExpenseReason::filters($request->all())->search($request->all());

        return response()->json($expenseReasons, 200);
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
     * Display the specified resource.
     *
     * @param  \App\Models\ExpenseReason  $expenseReason
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseReason $expenseReason)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExpenseReason  $expenseReason
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpenseReason $expenseReason)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExpenseReason  $expenseReason
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExpenseReason $expenseReason)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpenseReason  $expenseReason
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenseReason $expenseReason)
    {
        //
    }
}
