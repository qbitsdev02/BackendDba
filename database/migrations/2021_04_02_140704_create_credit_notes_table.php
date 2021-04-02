<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bill_electronic_id')->constrained();
            $table->foreignId('voucher_type_note_id')->constrained();
            $table->foreignId('type_of_credit_note_id')->constrained();
            $table->string('description')->nullable();
            $table->string('purchase_order')->nullable();
            $table->string('exchange_rate')->nullable();
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
        Schema::dropIfExists('credit_notes');
    }
}
