<?php

namespace App\Http\Controllers;

use App\Models\SwornDeclaration;
use App\Http\Requests\StoreSwornDeclarationRequest;
use App\Http\Requests\UpdateSwornDeclarationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $files = $request->file('files');
        if($request->has('files')) {
            for($i = 0; $i < count($files); $i++) {
                $file = $files[$i];
                $filename = $file->getClientOriginalName();
                Storage::disk('local')->put($filename, 'img_sworn_declarations');
                $url = Storage::url($filename);
                $swornDeclaration = new SwornDeclaration();
                $swornDeclaration->imagen = $url;
                $swornDeclaration->guide_id = $request->guide_id;
                $swornDeclaration->user_created_id = $request->user_created_id;
                $swornDeclaration->save();
            }
        }
        return response()->json(['message' => 'File has been Successfully Uploaded'], 201);
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
    public function update(UpdateSwornDeclarationRequest $request, $id)
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
