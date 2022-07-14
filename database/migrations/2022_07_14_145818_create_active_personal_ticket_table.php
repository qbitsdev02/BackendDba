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
        Schema::create('active_personal_ticket', function (Blueprint $table) {
            $table->id();
            $table->foreignId('active_id')->constrained();
            $table->foreignId('personal_id')->constrained();
            $table->foreignId('ticket_id')->constrained();
            $table->foreignId('user_created_id')->constrained('users');
            $table->foreignId('user_update_id')->nullable()->constrained('users');
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
        Schema::dropIfExists('active_personal_ticket');
    }
};
