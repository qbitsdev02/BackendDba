<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoinIdToBillElectronicPayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bill_electronic_payments', function (Blueprint $table) {
            $table->foreignId('coin_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bill_electronic_payments', function (Blueprint $table) {
            $table->dropColumn('coin_id');
            $table->dropForeign('bill_electronic_payments_coin_id_foreign');
        });
    }
}