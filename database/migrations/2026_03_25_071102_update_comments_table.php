<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('comments', function (Blueprint $table) {

            // add user_id
            $table->foreignId('user_id')->after('post_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // remove old columns
            $table->dropColumn(['name','email']);
        });
    }

    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {

            // rollback
            $table->string('name');
            $table->string('email')->nullable();

            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};