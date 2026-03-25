<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            // Basic
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description')->nullable();

            // Relation
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();

            // Flags
            $table->boolean('is_featured')->default(false);

            // SEO 🔥
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};