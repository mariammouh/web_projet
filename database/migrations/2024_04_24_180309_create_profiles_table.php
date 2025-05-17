<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary(); // Clé primaire non auto-incrémentée
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->text('bio')->nullable();
            $table->string('pic')->default('/img/profile.png');
            $table->string('title')->nullable();
            $table->string('school')->nullable();
            $table->string('website')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};