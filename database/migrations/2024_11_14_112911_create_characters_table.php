<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Имя персонажа
            $table->string('voice_actor')->nullable(); // Имя актёра озвучивания
            $table->text('description')->nullable(); // Описание персонажа
            $table->foreignId('anime_id')->constrained()->onDelete('cascade'); // Связь с аниме
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};
