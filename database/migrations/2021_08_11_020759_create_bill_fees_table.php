<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_fees', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->float('amount');
            $table->foreignId('bill_electronic_id')->constrained();
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
        Schema::dropIfExists('bill_fees');
    }
}
