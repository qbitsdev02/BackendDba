<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('users');
            $table->string('validity_time')->nullable();
            $table->string('delivery_time')->nullable();
            $table->string('shipping_address')->nullable();
            $table->foreignId('payment_method_id')->constrained();
            $table->string('account_number')->nullable();
            $table->foreignId('coin_id')->constrained();
            $table->foreignId('seller_id')->constrained('users');
            $table->string('exchange_rate')->nullable();
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
        Schema::dropIfExists('quotations');
    }
}
