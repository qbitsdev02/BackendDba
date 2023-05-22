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
        Schema::create('guide_guide_service_cost', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guide_id')->constrained();
            $table->foreignId('guide_service_cost_id')->constrained();
            $table->foreignId('provider_id')->constrained();
            $table->float('price');
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
        Schema::dropIfExists('guide_guide_service_cost');
    }
};
