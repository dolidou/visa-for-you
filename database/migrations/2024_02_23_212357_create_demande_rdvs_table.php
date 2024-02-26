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
        Schema::create('demande_rdvs', function (Blueprint $table) {
            $table->id();
            $table->date('date_rdv');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('pays_id');
            $table->unsignedBigInteger('type_visa_id');
            $table->timestamps();
        
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('pays_id')->references('id')->on('pays')->onDelete('cascade');
            $table->foreign('type_visa_id')->references('id')->on('type_visas')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demande_rdvs');
    }
};
