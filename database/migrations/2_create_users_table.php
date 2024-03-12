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
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('nom');
            $table->string('prenom');
            $table->string('pseudo');
            $table->boolean('admin')->default(false);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('character_id');
            $table->foreign('character_id')->references('id')->on('characters')->onDelete('cascade');
            
            $table->integer('jours')->default(0);
            $table->integer('merite')->default(0);
            $table->integer('limite');
            $table->rememberToken();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
