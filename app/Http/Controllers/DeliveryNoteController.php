<?php

namespace App\Http\Controllers;

use App\Helpers\DeliveryNoteHelper;
use App\Models\DeliveryNote;
use App\Http\Requests\StoreDeliveryNoteRequest;
use App\Http\Requests\UpdateDeliveryNoteRequest;
use Illuminate\Http\Request;

class DeliveryNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $deliveryNotes = DeliveryNote::filters($request->all())
            ->search($request->all());

        return response()->json($deliveryNotes, 200);
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
     * @param  \App\Http\Requests\StoreDeliveryNoteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeliveryNoteRequest $request)
    {
        $deliveryNote = new DeliveryNote();
        $deliveryNote->guide_number = $request->guide_number;
        $deliveryNote->destination_address = $request->destination_address;
        $deliveryNote->material = $request->material;
        $deliveryNote->driver_name = $request->driver_name;
        $deliveryNote->driver_document_number = $request->driver_document_number;
        $deliveryNote->vehicle_brand = $request->vehicle_brand;
        $deliveryNote->vehicle_model = $request->vehicle_model;
        $deliveryNote->vehicle_plate = $request->vehicle_plate;
        $deliveryNote->trailer_plate = $request->trailer_plate;
        $deliveryNote->trailer_model = $request->trailer_model;
        $deliveryNote->start_date = $request->start_date;
        $deliveryNote->deadline = $request->deadline;
        $deliveryNote->origin_address = $request->origin_address;
        $deliveryNote->serie_number = DeliveryNoteHelper::lastSerieNumber($request->serie_number, $request->material_supplier_id);
        $deliveryNote->client_id = $request->client_id;
        $deliveryNote->user_created_id = $request->user_created_id;
        $deliveryNote->material_supplier_id = $request->material_supplier_id;
        $deliveryNote->save();
        return response()->json($deliveryNote, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeliveryNote  $deliveryNote
     * @return \Illuminate\Http\Response
     */
    public function show(DeliveryNote $deliveryNote)
    {
        return response()->json($deliveryNote, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeliveryNote  $deliveryNote
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliveryNote $deliveryNote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeliveryNoteRequest  $request
     * @param  \App\Models\DeliveryNote  $deliveryNote
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeliveryNoteRequest $request, DeliveryNote $deliveryNote)
    {
        $deliveryNote->guide_number = $request->guide_number;
        $deliveryNote->destination_address = $request->destination_address;
        $deliveryNote->material = $request->material;
        $deliveryNote->driver_name = $request->driver_name;
        $deliveryNote->driver_document_number = $request->driver_document_number;
        $deliveryNote->vehicle_brand = $request->vehicle_brand;
        $deliveryNote->vehicle_model = $request->vehicle_model;
        $deliveryNote->vehicle_plate = $request->vehicle_plate;
        $deliveryNote->trailer_plate = $request->trailer_plate;
        $deliveryNote->trailer_model = $request->trailer_model;
        $deliveryNote->start_date = $request->start_date;
        $deliveryNote->deadline = $request->deadline;
        $deliveryNote->origin_address = $request->origin_address;
        $deliveryNote->serie_number = DeliveryNoteHelper::lastSerieNumber($request->serie_number, $request->material_supplier_id);
        $deliveryNote->client_id = $request->client_id;
        $deliveryNote->user_updated_id = $request->user_updated_id;
        $deliveryNote->material_supplier_id = $request->material_supplier_id;
        $deliveryNote->update();
        return response()->json($deliveryNote, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeliveryNote  $deliveryNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryNote $deliveryNote)
    {
        //
    }
}
