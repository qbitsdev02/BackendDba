<?php

namespace App\Http\Controllers;

use App\Models\Triler;
use App\Http\Requests\StoreTrilerRequest;
use App\Http\Requests\UpdateTrilerRequest;

class TrilerController extends Controller
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
     * @param  \App\Http\Requests\StoreTrilerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrilerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Triler  $triler
     * @return \Illuminate\Http\Response
     */
    public function show(Triler $triler)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Triler  $triler
     * @return \Illuminate\Http\Response
     */
    public function edit(Triler $triler)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTrilerRequest  $request
     * @param  \App\Models\Triler  $triler
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrilerRequest $request, Triler $triler)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Triler  $triler
     * @return \Illuminate\Http\Response
     */
    public function destroy(Triler $triler)
    {
        //
    }
}
