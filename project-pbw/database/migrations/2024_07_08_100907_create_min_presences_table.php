<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up()
    {
        Schema::create('min_presence', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_worker');
            $table->unsignedInteger('no_month');
            $table->unsignedInteger('min_pres');
            $table->timestamps();
            
            $table->foreign('id_worker')->references('id_worker')->on('workers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('min_presence');
    }
};