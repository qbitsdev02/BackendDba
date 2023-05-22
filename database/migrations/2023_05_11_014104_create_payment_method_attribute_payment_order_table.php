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
        Schema::create('payment_method_attribute_payment_order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('payment_method_attribute_id');
            $table->unsignedBigInteger('payment_order_id');

            $table->foreign('payment_method_attribute_id', 'pm_att_po_pm_att_id_fk')
                ->references('id')
                ->on('payment_method_attributes')
                ->onDelete('cascade');

            $table->foreign('payment_order_id', 'pm_att_po_po_id_fk')
                ->references('id')
                ->on('payment_orders')
                ->onDelete('cascade');
            $table->string('value')->nullable();
            $table->timestamps();
            $table->foreignId('user_created_id')->nullable()->constrained('users');
            $table->foreignId('user_updated_id')->nullable()->constrained('users');
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
        Schema::dropIfExists('payment_method_attribute_payment_order');
    }
};
