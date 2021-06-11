<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuideDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guide_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guide_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->integer('amount');
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
        Schema::dropIfExists('guide_details');
    }
}
