<?php

namespace App\Http\Controllers;

use App\Exports\MasterSheetExport;
use App\Models\MasterSheet;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMasterSheetRequest;
use App\Http\Requests\UpdateMasterSheetRequest;
use App\Imports\MasterSheetImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;

class MasterSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = MasterSheet::filters(request()->all())
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
     * @param  \App\Http\Requests\StoreMasterSheetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMasterSheetRequest $request)
    {
        $masterSheet = MasterSheet::create($request->all());
        return response()->json(
            [
                'data' => $masterSheet,
                'message' => 'Successfully stored master sheet',
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterSheet  $masterSheet
     * @return \Illuminate\Http\Response
     */
    public function show(MasterSheet $masterSheet)
    {
        return response()->json(
            [
                'data' => $masterSheet,
                'message' => 'Successfully response'
            ],
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMasterSheetRequest  $request
     * @param  \App\Models\MasterSheet  $masterSheet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMasterSheetRequest $request, MasterSheet $masterSheet)
    {
        $masterSheet->update($request->all());
        return response()->json(
            [
                'data' => $masterSheet,
                'message' => 'Successfully updated master'
            ],
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterSheet  $masterSheet
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterSheet $masterSheet)
    {
        $masterSheet->delete();
        return response()->json(
            [
                'data' => $masterSheet,
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
        Excel::import(new MasterSheetImport, $request->file('file'));

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
        //Excel::download(new MasterSheetExport, 'master-sheet.xlsx');

        return new MasterSheetExport(MasterSheet::all(), $request->columns, $request->heading);
    }
}
