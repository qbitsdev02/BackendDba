<?php

namespace App\Http\Controllers;

use App\Models\SwornDeclaration;
use App\Http\Requests\StoreSwornDeclarationRequest;
use App\Http\Requests\UpdateSwornDeclarationRequest;

class SwornDeclarationController extends Controller
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
     * @param  \App\Http\Requests\StoreSwornDeclarationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSwornDeclarationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SwornDeclaration  $swornDeclaration
     * @return \Illuminate\Http\Response
     */
    public function show(SwornDeclaration $swornDeclaration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SwornDeclaration  $swornDeclaration
     * @return \Illuminate\Http\Response
     */
    public function edit(SwornDeclaration $swornDeclaration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSwornDeclarationRequest  $request
     * @param  \App\Models\SwornDeclaration  $swornDeclaration
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSwornDeclarationRequest $request, SwornDeclaration $swornDeclaration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SwornDeclaration  $swornDeclaration
     * @return \Illuminate\Http\Response
     */
    public function destroy(SwornDeclaration $swornDeclaration)
    {
        //
    }
}
