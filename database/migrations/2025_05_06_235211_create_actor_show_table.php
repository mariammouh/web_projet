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
        Schema::create('actor_show', function (Blueprint $table) {
            $table->id();

            $table->foreignId('actor_id')
                ->constrained('actors')
                ->onDelete('cascade');

            $table->foreignId('show_id')
                ->constrained('shows')
                ->onDelete('cascade');

            $table->string('role')->nullable(); // Optional: character name
            $table->timestamps();

            $table->unique(['actor_id', 'show_id']); // Avoid duplicates
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actor_show');
    }
};
