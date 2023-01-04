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
        Schema::create('cash_flows', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('category')->nullable();
            $table->string('concept_type')->nullable();
            $table->string('concept')->nullable();
            $table->string('beneficiary')->nullable();
            $table->string('provider')->nullable();
            $table->string('description')->nullable();
            $table->string('guide_number')->nullable();
            $table->string('weight')->nullable();
            $table->string('control_number')->nullable();
            $table->string('must')->nullable();
            $table->string('to_have')->nullable();
            $table->string('balance')->nullable();
            $table->string('user_created_id')->nullable();
            $table->string('user_updated_id')->nullable();
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
        Schema::dropIfExists('cash_flows');
    }
};
