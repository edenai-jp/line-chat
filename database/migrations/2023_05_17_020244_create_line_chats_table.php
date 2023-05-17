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
        Schema::create('line_chats', function (Blueprint $table) {
            $table->id();
            $table->string('line_id');
            $table->string('answer_by');
            $table->text('question');
            $table->text('answer');
            $table->softDeletes();
            $table->timestamps();
            $table->index('line_id');
            $table->index('answer_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('line_chats');
    }
};
