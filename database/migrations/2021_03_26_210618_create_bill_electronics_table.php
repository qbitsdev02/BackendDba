<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillElectronicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_electronics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('serie_id')->constrained();
            $table->foreignId('client_id')->constrained('users');
            $table->foreignId('voucher_type_id')->constrained();
            $table->foreignId('branch_office_id')->constrained();
            $table->foreignId('operation_type_id')->constrained();
            $table->foreignId('seller_id')->constrained('users');
            $table->foreignId('coin_id')->constrained();
            $table->string('exchange_rate')->nullable();
            $table->string('igv')->nullable();
            $table->date('expiration_date')->nullable();
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
        Schema::dropIfExists('bill_electronics');
    }
}
