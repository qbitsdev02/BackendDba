<?php

namespace App\Http\Controllers;

use App\Exports\CashFlowExport;
use App\Models\CashFlow;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCashFlowRequest;
use App\Http\Requests\UpdateCashFlowRequest;
use App\Imports\CashFlowImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CashFlowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = CashFlow::filters(request()->all())
            ->filterWhereIn($request->all())
            ->search(request()->all());
        return response()->json(
            [
                'data' => $data,
                'message' => 'Successfully response'
            ],
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCashFlowRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCashFlowRequest $request)
    {
        $cashFlow = CashFlow::create($request->all());
        return response()->json(
            [
                'data' => $cashFlow,
                'message' => 'Successfully stored master sheet',
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CashFlow  $cashFlow
     * @return \Illuminate\Http\Response
     */
    public function show(CashFlow $cashFlow)
    {
        return response()->json(
            [
                'data' => $cashFlow,
                'message' => 'Successfully response'
            ],
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCashFlowRequest  $request
     * @param  \App\Models\CashFlow  $cashFlow
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCashFlowRequest $request, CashFlow $cashFlow)
    {
        $cashFlow->update($request->all());
        return response()->json(
            [
                'data' => $cashFlow,
                'message' => 'Successfully updated master'
            ],
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CashFlow  $cashFlow
     * @return \Illuminate\Http\Response
     */
    public function destroy(CashFlow $cashFlow)
    {
        $cashFlow->delete();
        return response()->json(
            [
                'data' => $cashFlow,
                'message' => 'Successfully removed master'
            ],
            200
        );
    }

    /**
     * this function import file
     */
    public function importData(Request $request)
    {
        Excel::import(new CashFlowImport, $request->file('file'));

        return response()->json(
            [
                'message' => 'Successfully imported'
            ],
            200
        );
    }

    /***
     *
     */
    public function export(Request $request)
    {
        //Excel::download(new CashFlowExport, 'master-sheet.xlsx');

        return new CashFlowExport(CashFlow::all(), $request->columns, $request->heading);
    }

    /**
     *
     */

     public function filterSelects (Request $request)
     {
        $cashFlows = CashFlow::select($request->select)
            ->filters($request->all())
            ->groupBy($request->select)
            ->search($request->all());
        return response()->json($cashFlows, 200);
     }
}
