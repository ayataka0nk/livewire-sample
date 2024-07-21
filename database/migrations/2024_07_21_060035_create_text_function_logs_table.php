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
        Schema::create('text_function_logs', function (Blueprint $table) {
            $table->id();
            $table->longText('definition');
            $table->longText('input');
            $table->longText('output');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('text_function_logs');
    }
};
