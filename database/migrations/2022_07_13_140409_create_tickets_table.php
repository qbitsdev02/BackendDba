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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('provider_id')->constrained();
            $table->foreignId('field_id')->constrained();
            $table->foreignId('guide_id')->constrained();
            $table->float('tare_weight');
            $table->float('gross_weight');
            $table->float('tare');
            $table->float('penalty')->default(0);
            $table->string('vehicle_number');
            $table->string('certificate');
            $table->date('start_date')->nullable();
            $table->time('start_time')->nullable();
            $table->time('final_time');
            $table->date('final_date');
            $table->string('checkweighing');
            $table->foreignId('client_id')->constrained();
            $table->foreignId('personal_id')->constrained();
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
        Schema::dropIfExists('tickets');
    }
};
