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
    public function up()
    {
        Schema::create('shows', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('release_date');
            $table->string('genre');
            $table->string('director');
            $table->string('production_company');
            $table->integer('nbr_seasons');
            $table->integer('nbr_episodes');
            $table->string('main_leads');
            $table->text('plot_summary')->nullable();
            $table->string('rating')->nullable();
            $table->string('country')->nullable();
            $table->string('language')->nullable();
            $table->string('poster');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shows');
    }
};
