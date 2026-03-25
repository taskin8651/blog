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
        Schema::create('ads', function (Blueprint $table) {
    $table->id();

    // Basic
    $table->string('title');
    $table->string('image')->nullable();
    $table->string('link')->nullable();

    // Position
    $table->string('position'); // top, sidebar, inline, footer

    // Type 🔥
    $table->enum('type', ['image', 'script'])->default('image'); 
    // image = banner, script = google ads

    // Script Ads (Google Adsense)
    $table->longText('script')->nullable();

    // Status
    $table->boolean('is_active')->default(true);

    // Schedule 🔥
    $table->timestamp('start_at')->nullable();
    $table->timestamp('end_at')->nullable();

    // Priority (multiple ads handling)
    $table->integer('priority')->default(0);

    // Analytics 🔥
    $table->unsignedBigInteger('views')->default(0);
    $table->unsignedBigInteger('clicks')->default(0);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
