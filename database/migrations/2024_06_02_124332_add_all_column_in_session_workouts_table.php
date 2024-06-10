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
        Schema::table('session_workouts', function (Blueprint $table) {
            $table->foreignId('workouts_id')->constrained('workouts');
            $table->string('exercise', 30);
            $table->string('rest', 30);
            $table->string('rir', 30);
            $table->string('reps', 30);
            $table->string('sets', 20);
            $table->string('weight_reps', 40)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('session_workouts', function (Blueprint $table) {
            //
        });
    }
};
