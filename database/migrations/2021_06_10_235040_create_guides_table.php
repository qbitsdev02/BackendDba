<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guides', function (Blueprint $table) {
            $table->id();
            $table->string('serie');
            $table->integer('serie_number');
            $table->date('date_of_issue');
            $table->date('date_transfer');
            $table->float('total_weight');
            $table->float('total_packet');
            $table->string('description')->nullable();
            $table->foreignId('branch_office_id')->constrained();
            $table->foreignId('measurement_unit_id')->constrained();
            $table->foreignId('transfer_mode_id')->constrained();
            $table->foreignId('transfer_subject_id')->constrained();
            $table->foreignId('client_id')->constrained('users');
            $table->string('observation')->nullable();

            // Datos envío
            $table->string('from_country');
            $table->string('from_ubigeo');
            $table->string('from_address');
            $table->string('to_country');
            $table->string('to_ubigeo');
            $table->string('to_address');

            // Datos transportista
            $table->foreignId('carrier_document_type_id')->constrained('document_types');
            $table->string('carrier_document_number');
            $table->string('carrier_name');

            // Datos conductor
            $table->foreignId('driver_document_type_id')->constrained('document_types');
            $table->string('driver_name');
            $table->string('driver_document_number');
            $table->string('plate_number');
            $table->string('license_number')->nullable();
            $table->string('semitrailer_number')->nullable();

            $table->foreignId('user_created_id')->constrained('users');
            $table->foreignId('user_updated_id')->nullable()->constrained('users');
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
        Schema::dropIfExists('guides');
    }
}
