<?php

namespace App\Http\Controllers;

use App\Models\BudgetRequest;
use Illuminate\Http\Request;

class BudgetRequestController extends Controller
{
/**
     * @OA\Get(
     *     path="/api/budget-requests",
     *     summary="Show Budget-requests",
     *     tags={"BudgetRequest"},
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
     *       description="BudgetRequest resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="id",
     *           description="The unique identifier of a BudgetRequest resource"
     *       )
     *     ),
     *     @OA\Parameter(
     *       name="sortOrder",
     *       in="query",
     *       description="BudgetRequest resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="desc",
     *           description="The unique identifier of a BudgetRequest resource"
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
     *           description="The unique identifier of a BudgetRequest resource"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataSearch",
     *       in="query",
     *       description="BudgetRequest resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="Search data"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataFilter",
     *       in="query",
     *       description="BudgetRequest resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="The unique identifier of a BudgetRequest resource"
     *       )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Show Budget-requests all."
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
        $budgetRequests = BudgetRequest::with(
             'budgetRequestDetails.product:id,name'
            )
            ->filters($request->all())
            ->search($request->all());
        return response()->json($budgetRequests, 200);
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
     *   path="/api/budget-requests",
     *   summary="Creates a new BudgetRequest",
     *   description="Creates a new BudgetRequest",
     *   tags={"BudgetRequest"},
     *   security={{"passport": {"*"}}},
     *   @OA\RequestBody(
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/BudgetRequest")
     *       )
     *   ),
     *   @OA\Response(
     *       @OA\MediaType(mediaType="application/json"),
     *       response=200,
     *       description="The Brand resource created",
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
        $budgetRequest = new BudgetRequest();
        $budgetRequest->status = 'registrado';
        $budgetRequest->user_created_id = $request->user_created_id;
        $budgetRequest->save();
        return response($budgetRequest, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BudgetRequest  $budgetRequest
     * @return \Illuminate\Http\Response
     */
    public function show(BudgetRequest $budgetRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BudgetRequest  $budgetRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(BudgetRequest $budgetRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BudgetRequest  $budgetRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BudgetRequest $budgetRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BudgetRequest  $budgetRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(BudgetRequest $budgetRequest)
    {
        //
    }
}
