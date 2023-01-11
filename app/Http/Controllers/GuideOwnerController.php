<?php

namespace App\Http\Controllers;

use App\Models\GuideOwner;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGuideOwnerRequest;
use App\Http\Requests\UpdateGuideOwnerRequest;

class GuideOwnerController extends Controller
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
     * @param  \App\Http\Requests\StoreGuideOwnerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGuideOwnerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GuideOwner  $guideOwner
     * @return \Illuminate\Http\Response
     */
    public function show(GuideOwner $guideOwner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GuideOwner  $guideOwner
     * @return \Illuminate\Http\Response
     */
    public function edit(GuideOwner $guideOwner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGuideOwnerRequest  $request
     * @param  \App\Models\GuideOwner  $guideOwner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGuideOwnerRequest $request, GuideOwner $guideOwner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GuideOwner  $guideOwner
     * @return \Illuminate\Http\Response
     */
    public function destroy(GuideOwner $guideOwner)
    {
        //
    }
}
