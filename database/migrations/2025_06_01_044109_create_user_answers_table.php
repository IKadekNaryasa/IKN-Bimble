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
        Schema::create('user_answers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->index('user_id');
            $table->foreignUuid('question_id')->constrained('questions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->index('question_id');
            $table->enum('answer', ['A', 'B', 'C', 'D', 'E']);
            $table->boolean('is_correct');
            $table->dateTime('submited_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_answers');
    }
};
