<?php

namespace App\Http\Controllers;

use App\Models\Active;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreActiveRequest;
use App\Http\Requests\UpdateActiveRequest;

class ActiveController extends Controller
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
     * @param  \App\Http\Requests\StoreActiveRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreActiveRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Active  $active
     * @return \Illuminate\Http\Response
     */
    public function show(Active $active)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Active  $active
     * @return \Illuminate\Http\Response
     */
    public function edit(Active $active)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateActiveRequest  $request
     * @param  \App\Models\Active  $active
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateActiveRequest $request, Active $active)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Active  $active
     * @return \Illuminate\Http\Response
     */
    public function destroy(Active $active)
    {
        //
    }
}
