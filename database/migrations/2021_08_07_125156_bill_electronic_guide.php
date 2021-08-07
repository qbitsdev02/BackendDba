<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BillElectronicGuide extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_electronic_guide', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->string('observation')->nullable();
            $table->string('purchase_order')->nullable();
            $table->foreignId('guide_id')->constrained();
            $table->foreignId('bill_electronic_id')->constrained();
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
        Schema::dropIfExists('bill_electronic_guide');
    }
}
