<?php

namespace App\Http\Controllers;

use App\Models\purcharse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorepurcharseRequest;
use App\Http\Requests\UpdatepurcharseRequest;

class PurcharseController extends Controller
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
     * @param  \App\Http\Requests\StorepurcharseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepurcharseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\purcharse  $purcharse
     * @return \Illuminate\Http\Response
     */
    public function show(purcharse $purcharse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\purcharse  $purcharse
     * @return \Illuminate\Http\Response
     */
    public function edit(purcharse $purcharse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepurcharseRequest  $request
     * @param  \App\Models\purcharse  $purcharse
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepurcharseRequest $request, purcharse $purcharse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\purcharse  $purcharse
     * @return \Illuminate\Http\Response
     */
    public function destroy(purcharse $purcharse)
    {
        //
    }
}
