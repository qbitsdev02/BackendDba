<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_orders', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->enum('status', ['pending_approval', 'approved', 'canceled'])->default('pending_approval');
            $table->float('amount');
            $table->foreignId('payment_method_id')->constrained('payment_methods');
            $table->foreignId('organization_id')->constrained();
            $table->morphs('ownerable');
            $table->foreignId('branch_office_id')->constrained();
            $table->foreignId('coin_id')->constrained();
            $table->foreignId('concept_id')->constrained();
            $table->foreignId('country_id')->nullable()->constrained();
            $table->date('payment_date')->nullable()->constrained();
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
        Schema::dropIfExists('payment_orders');
    }
}
