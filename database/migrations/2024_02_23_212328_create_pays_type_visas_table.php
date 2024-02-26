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
        Schema::create('pays_type_visa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_visa_id');
            $table->unsignedBigInteger('pays_id');
            $table->foreign('type_visa_id')->references('id')->on('type_visas')->onDelete('cascade');
            $table->foreign('pays_id')->references('id')->on('pays')->onDelete('cascade');
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
        Schema::dropIfExists('pays_type_visas');
    }
};
