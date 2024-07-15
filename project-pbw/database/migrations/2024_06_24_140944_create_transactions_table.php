<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaction', function (Blueprint $table) {
            Schema::dropIfExists('transaction');

            $table->id();
            $table->string('name_room');
            $table->foreign('name_room')->references('name_room')->on('rooms')->onDelete('cascade');
            $table->date('checkIn_date');
            $table->date('checkOut_date');
            $table->decimal('payment', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
