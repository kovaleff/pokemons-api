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
        Schema::create('pokemons', function (Blueprint $table) {
            $table->id();
            $table->char('name')->unique();
            $table->integer('position');
            $table->enum('form',['head','head_legs','fins','wings']);

            $table->unsignedBigInteger('image_id');
            $table->foreign('image_id')->references('id')->on('images')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('id')->on('locations')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemons');
    }
};
