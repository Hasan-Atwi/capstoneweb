<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // CreateDonationsTable.php
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 10, 2);
            $table->string('donor_name');
            $table->unsignedBigInteger('memorial_id');
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('memorial_id')->references('id')->on('memorials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
