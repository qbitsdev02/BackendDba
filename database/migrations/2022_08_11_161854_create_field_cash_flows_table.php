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
        Schema::create('field_cash_flows', function (Blueprint $table) {
            $table->id();
            $table->float('amount');
            $table->foreignId('concept_id')->constrained();
            $table->enum('status', ['pending_approval', 'approved','canceled'])->default('approved');
            $table->foreignId('transaction_id')->nullable()->constrained();
            $table->string('description')->nullable();
            $table->foreignId('field_id')->constrained();
            $table->float('balance');
            $table->foreignId('beneficiary_id')->nullable()->constrained('users');
            $table->foreignId('user_created_id')->constrained('users');
            $table->foreignId('user_updated_id')->nullable()->constrained('users');
            $table->timestamp('date');
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
        Schema::dropIfExists('field_cash_flows');
    }
};
