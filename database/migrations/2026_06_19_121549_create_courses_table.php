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
        Schema::create('courses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2)->default(0.00);
            $table->boolean('is_published')->default(false);
            $table->foreignUuid('category_id')->constrained('categories')->onDelete('cascade'); 
            $table->foreignUuid('instructor_id')->constrained('users')->onDelete('cascade');
            $table->unique(['instructor_id', 'title']);
            $table->index('category_id');
            $table->index('instructor_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
