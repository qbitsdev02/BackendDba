<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_suppliers', function (Blueprint $table) {
            $table->id();
            $table->text('seal')->nullable();
            $table->text('logo')->nullable();
            $table->integer('serie_number')->default(1);
            $table->text('signature')->nullable();
            $table->string('name');
            $table->string('document_number');
            $table->string('address')->nullable();
            $table->string('email');
            $table->string('phone_number');
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
        Schema::dropIfExists('material_suppliers');
    }
}
