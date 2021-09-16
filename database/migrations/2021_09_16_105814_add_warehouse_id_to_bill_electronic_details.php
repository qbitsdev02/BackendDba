<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWarehouseIdToBillElectronicDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bill_electronic_details', function (Blueprint $table) {
            $table->foreignId('warehouse_id')->default(1)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bill_electronic_details', function (Blueprint $table) {
            $table->dropColumn('warehouse_id');
            $table->dropForeign('bill_electronic_details_warehouse_id_foreign');
        });
    }
}
