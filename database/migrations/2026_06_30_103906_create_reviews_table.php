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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignUuid('course_id')->constrained('courses')->onDelete('cascade');
            $table->unsignedTinyInteger('rating')->default(0);
            $table->text('comment')->nullable();
            $table->timestamps();
            $table->unique(['user_id', 'course_id']);
        });

        DB::statement('ALTER TABLE reviews ADD CONSTRAINT chk_rating CHECK (rating BETWEEN 0 AND 5)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
