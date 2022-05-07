<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_notes', function (Blueprint $table) {
            $table->id();
            $table->string('guide_number');
            $table->string('destination_address');
            $table->string('material');
            $table->string('driver_name');
            $table->string('driver_document_number');
            $table->integer('serie_number')->default(1);
            $table->string('vehicle_brand');
            $table->string('vehicle_model');
            $table->string('vehicle_plate');
            $table->string('trailer_plate');
            $table->string('trailer_model');
            $table->string('origin_address');
            $table->date('start_date');
            $table->date('deadline');
            $table->foreignId('client_id')->constrained();
            $table->foreignId('user_created_id')->constrained('users');
            $table->foreignId('material_supplier_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_notes');
    }
}
