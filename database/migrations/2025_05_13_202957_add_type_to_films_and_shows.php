<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('films', function (Blueprint $table) {
            $table->enum('type', ['film', 'anime'])->default('film')->after('id');
        });
        
        Schema::table('shows', function (Blueprint $table) {
            $table->enum('type', ['series', 'anime', 'kdrama'])->default('series')->after('id');
        });
    }

    public function down()
    {
        Schema::table('films', function (Blueprint $table) {
            $table->dropColumn('type');
        });
        
        Schema::table('shows', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
};
