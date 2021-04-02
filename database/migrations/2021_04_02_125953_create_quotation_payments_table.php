<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quotation_id')->constrained();
            $table->foreignId('payment_method_id')->constrained();
            $table->foreignId('payment_destination_id')->constrained();
            $table->string('reference')->nullable();
            $table->float('amount')->nullable();
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
        Schema::dropIfExists('quotation_payments');
    }
}
