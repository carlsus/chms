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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('contact_no',20)->nullable();
            $table->string('gender');
            $table->text('address')->nullable();
            $table->enum('status', ['pending','disapproved', 'approved'])->default('pending');
            $table->text('fb')->nullable();
            $table->text('img')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('user_type', ['user', 'member','leader'])->default('member');
            $table->enum('built_in', [0,1])->default('0');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
