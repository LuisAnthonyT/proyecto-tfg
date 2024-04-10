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
        Schema::create('athletes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('trainer_id')->nullable()->constrained('trainers');
            $table->string('height', 5);
            $table->string('weight', 5);
            $table->string('gender', 10);
            $table->string('objetive', 20);
            $table->integer('days_available_week');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('athletes');
    }
};
