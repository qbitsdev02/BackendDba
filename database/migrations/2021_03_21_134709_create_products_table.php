<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('code_sunat')->nullable();
            $table->string('name');
            $table->string('description')->nullable();
            $table->foreignId('vehicle_model_id')->constrained();
            $table->foreignId('vehicle_type_id')->constrained();
            $table->foreignId('vehicle_brand_id')->constrained();
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
        Schema::dropIfExists('products');
    }
}
