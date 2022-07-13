<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->float('rate');
            $table->text('description');
            $table->foreignId('provider_id')->constrained();
            $table->foreignId('unit_of_measurement_id')->constrained();
            $table->foreignId('coin_id')->nullable()->constrained();
            $table->foreignId('user_created_id')->constrained('users');
            $table->foreignId('user_update_id')->nullable()->constrained('users');
            $table->softDeletes();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rates');
    }
};
