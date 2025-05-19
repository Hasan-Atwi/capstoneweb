<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // CreatePhotosVideosTable.php
    public function up()
    {
        Schema::create('photos_videos', function (Blueprint $table) {
            $table->id();
            $table->string('image_path')->nullable();
            $table->string('video_path')->nullable();
            $table->text('caption')->nullable();
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
        Schema::dropIfExists('_photos_videos');
    }
};
