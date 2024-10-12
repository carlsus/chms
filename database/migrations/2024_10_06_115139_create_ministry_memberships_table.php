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
        Schema::create('ministry_memberships', function (Blueprint $table) {
            $table->id();
            $table->string('join_id');
            $table->unsignedBigInteger('ministry_code')->unsigned()->nullable();
            $table->foreign('ministry_code')->references('id')->on('ministries')->onDelete('cascade');
            $table->unsignedBigInteger('member_id')->unsigned()->nullable();
            $table->foreign('member_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ministry_memberships');
    }
};
