<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('slug', 2048);
            $table->string('thumbnail', 2048)->nullable();
            $table->boolean('active');
            $table->dateTime('published_at');
            // $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->dropColumn('thumbnail');
            $table->dropColumn('active');
            $table->dropColumn('published_at');
            // $table->dropForeign(['user_id']);
            // $table->dropColumn('user_id');
        });
    }
};
