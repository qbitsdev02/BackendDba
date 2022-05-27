<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwornDeclarationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sworn_declarations', function (Blueprint $table) {
            $table->id();
            $table->string('guide_id');
            $table->text('imagen');
            $table->foreignId('user_created_id')->constrained('users');
            $table->foreignId('user_updated_id')->constrained('users')->nullable();
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
        Schema::dropIfExists('sworn_declarations');
    }
}
