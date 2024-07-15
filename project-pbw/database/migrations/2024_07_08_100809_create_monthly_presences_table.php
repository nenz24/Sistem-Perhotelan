<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up()
    {
        Schema::create('monthly_presence', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_worker');
            $table->date('date');
            $table->unsignedInteger('no_month');
            $table->boolean('status_pres');
            $table->timestamps();
            
            $table->foreign('id_worker')->references('id_worker')->on('workers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('monthly_presence');
    }
};