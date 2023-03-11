<?php

namespace App\Http\Controllers;

use App\Models\ChartOfAccount;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChartOfAccountRequest;
use App\Http\Requests\UpdateChartOfAccountRequest;
use Illuminate\Http\Request;

class ChartOfAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $chartOfAccounts = ChartOfAccount::roots()
            ->with('children')
            ->filters($request->all())
            ->search($request->all());

        return response()->json($chartOfAccounts);
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
     * @param  \App\Http\Requests\StoreChartOfAccountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChartOfAccountRequest $request)
    {
        $chartOfAccount = new ChartOfAccount();
        $chartOfAccount->name = $request->name;
        $chartOfAccount->chart_of_account_id = $request->chart_of_account_id;
        $chartOfAccount->user_created_id = $request->user_created_id;
        $chartOfAccount->save();
        return response()->json($chartOfAccount, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChartOfAccount  $chartOfAccount
     * @return \Illuminate\Http\Response
     */
    public function show(ChartOfAccount $chartOfAccount)
    {
        return response()->json($chartOfAccount, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChartOfAccount  $chartOfAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(ChartOfAccount $chartOfAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChartOfAccountRequest  $request
     * @param  \App\Models\ChartOfAccount  $chartOfAccount
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChartOfAccountRequest $request, ChartOfAccount $chartOfAccount)
    {
        $chartOfAccount->name = $request->name;
        $chartOfAccount->code = $request->code;
        $chartOfAccount->chart_of_account_id = $request->chart_of_account_id;
        $chartOfAccount->user_updated_id = $request->user_updated_id;
        $chartOfAccount->update();
        return response()->json($chartOfAccount, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChartOfAccount  $chartOfAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChartOfAccount $chartOfAccount)
    {
        $chartOfAccount->delete();
        return response()->json($chartOfAccount, 200);
    }
}
