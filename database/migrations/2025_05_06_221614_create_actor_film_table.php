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
    public function up(): void
    {
        Schema::create('actor_film', function (Blueprint $table) {
            $table->id();

            $table->foreignId('actor_id')
                ->constrained('actors')
                ->onDelete('cascade');

            $table->foreignId('film_id')
                ->constrained('films')
                ->onDelete('cascade');

            $table->string('role')->nullable(); // Optional: character played
            $table->timestamps();

            $table->unique(['actor_id', 'film_id']); // Prevent duplicate entries
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actors');
    }
};
