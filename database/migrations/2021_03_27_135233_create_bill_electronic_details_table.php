<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillElectronicDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_electronic_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bill_electronic_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->integer('amount');
            $table->float('price');
            $table->float('discount')->nullable();
            $table->float('igv');
            $table->float('purchase_price');
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
        Schema::dropIfExists('bill_electronic_details');
    }
}
