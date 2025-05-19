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
        Schema::create('memorial_tribute', function (Blueprint $table) {
            $table->unsignedBigInteger('memorial_id');
            $table->unsignedBigInteger('tribute_id');
            $table->primary(['memorial_id', 'tribute_id']);

            $table->foreign('memorial_id')->references('id')->on('memorials')->onDelete('cascade');
            $table->foreign('tribute_id')->references('id')->on('tributes')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memorial_tribute');
    }
};
