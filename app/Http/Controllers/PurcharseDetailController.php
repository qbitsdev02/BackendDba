<?php

namespace App\Http\Controllers;

use App\Models\PurcharseDetail;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePurcharseDetailRequest;
use App\Http\Requests\UpdatePurcharseDetailRequest;

class PurcharseDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
     * @param  \App\Http\Requests\StorePurcharseDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePurcharseDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurcharseDetail  $purcharseDetail
     * @return \Illuminate\Http\Response
     */
    public function show(PurcharseDetail $purcharseDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurcharseDetail  $purcharseDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(PurcharseDetail $purcharseDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePurcharseDetailRequest  $request
     * @param  \App\Models\PurcharseDetail  $purcharseDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePurcharseDetailRequest $request, PurcharseDetail $purcharseDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurcharseDetail  $purcharseDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurcharseDetail $purcharseDetail)
    {
        //
    }
}
