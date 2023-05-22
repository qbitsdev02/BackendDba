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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->morphs('transactionable');
            $table->foreignId('branch_office_id')->constrained();
            $table->float('amount');
            $table->foreignId('responsable_id');
            $table->string('description')->nullable();
            $table->string('reference')->nullable();
            $table->foreignId('concept_id')->nullable()->constrained();
            $table->date('date')->nullable();
            $table->foreignId('payment_order_id')->constrained();
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
        Schema::dropIfExists('transactions');
    }
};
