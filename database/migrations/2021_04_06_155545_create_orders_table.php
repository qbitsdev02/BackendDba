<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('users');
            $table->date('delivery_date')->nullable();
            $table->date('expiration_date')->nullable();
            $table->string('address')->nullable();
            $table->string('observation')->nullable();
            $table->foreignId('coin_id')->constrained();
            $table->string('exchange_rate')->nullable();
            $table->foreignId('payment_method_id')->constrained();
            $table->foreignId('seller_id')->constrained('users');
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
        Schema::dropIfExists('orders');
    }
}
