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
        Schema::create('purcharse_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purcharse_id')->constrained();
            $table->foreignId('products_id')->constrained();
            $table->float('amount');
            $table->float('price');
            $table->foreignId('user_created_id')->constrained('users');
            $table->foreignId('user_updated_id')->nullable()->constrained('users');
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
        Schema::dropIfExists('purcharse_details');
    }
};
