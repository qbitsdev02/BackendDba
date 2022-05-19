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
            $table->integer('serie_number')->default(1);
            $table->date('start_date');
            $table->date('deadline');
            $table->string('origin_address');
            $table->string('destination_address');
            $table->string('material');
            $table->string('code_runpa');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->foreignId('material_supplier_id')->constrained();
            $table->foreignId('vehicle_id')->constrained();
            $table->foreignId('trailer_id')->constrained();
            $table->foreignId('client_id')->constrained();
            $table->foreignId('driver_id')->constrained();
            $table->foreignId('user_created_id')->constrained('users');
            $table->foreignId('user_updated_id')->constrained('users');
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
