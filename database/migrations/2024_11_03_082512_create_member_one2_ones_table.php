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
        Schema::create('member_one2_ones', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('one2one_id')->unsigned()->nullable();
            $table->foreign('one2one_id')->references('id')->on('one2_ones')->onDelete('cascade');
            $table->unsignedBigInteger('chapter_id')->unsigned()->nullable();
            $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade');
            $table->enum('status', ['in-progress','completed', 'not-started'])->default('not-started');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_one2_ones');
    }
};
