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
            $table->float('weight');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->foreignId('provider_id')->constrained();
            $table->foreignId('unit_of_measurement_id')->constrained();
            $table->foreignId('vehicle_id')->constrained('actives');
            $table->foreignId('trailer_id')->constrained('actives');
            $table->foreignId('client_id')->constrained();
            $table->foreignId('driver_id')->constrained('personals');
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
