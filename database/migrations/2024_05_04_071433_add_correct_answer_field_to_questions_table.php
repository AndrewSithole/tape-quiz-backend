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
        //Add the correct_answer field to the questions table
        Schema::table('questions', function (Blueprint $table) {
            $table->foreignId('correct_answer_option_id')->nullable()->constrained('answer_options')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign(['correct_answer_option_id']);
            $table->dropColumn('correct_answer_option_id');
        });
    }
};
