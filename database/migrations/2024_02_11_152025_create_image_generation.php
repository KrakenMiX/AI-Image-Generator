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
        Schema::create('image_generation', function (Blueprint $table) {
            $table->integerIncrements('id_image')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->string('type');
            $table->string('url');
            $table->text('prompt');
            $table->text('negative_prompt')->nullable();
            $table->integer('width')->unsigned();
            $table->integer('height')->unsigned();
            $table->tinyInteger('is_safe')->unsigned();
            $table->tinyInteger('is_post')->unsigned();
            $table->timestamps();
            $table->foreign('id_user')->references('id_user')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_generation');
    }
};
