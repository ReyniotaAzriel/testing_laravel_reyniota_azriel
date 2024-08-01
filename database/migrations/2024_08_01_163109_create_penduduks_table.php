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
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id()->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('name');
            $table->enum('gender', ['L', 'P']);
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->string('address');
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduks');
    }
};
