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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('serie');
            $table->foreignId('provider_id')->constrained('users');
            $table->foreignId('organization_id')->constrained();
            $table->foreignId('voucher_type_id')->constrained();
            $table->foreignId('coin_id')->constrained();
            $table->float('iva')->nullable();
            $table->date('create_date');
            $table->date('expiration_date')->nullable();
            $table->foreignId('user_created_id')->constrained('users');
            $table->foreignId('user_updated_id')->nullable()->constrained('users');
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
        Schema::dropIfExists('sales');
    }
};
