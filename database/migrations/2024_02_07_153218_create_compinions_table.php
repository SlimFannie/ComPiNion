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
        Schema::create('compinions', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('user_id')->constrained();
            $table->string('nom');
            $table->string('img')->nullable();
            $table->integer('jours')->default(0);
            $table->integer('experience')->default(0);
            $table->integer('merite')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compinions');
    }
};
