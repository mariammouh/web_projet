<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('film_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('show_id')->nullable()->constrained()->onDelete('cascade');
            $table->text('content');
            $table->integer('reports_count')->default(0);
            $table->text('reported_by')->nullable();
            $table->timestamps();
        });

        // Ajout de la contrainte CHECK après la création de la table
        DB::statement('ALTER TABLE comments ADD CONSTRAINT chk_film_or_show CHECK (film_id IS NOT NULL OR show_id IS NOT NULL)');
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
};