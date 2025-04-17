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
        Schema::create('family_members', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('head_of_family_id');
            $table->foreign('head_of_family_id')->references('id')->on('head_of_families');

            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('profile_picture');
            $table->bigInteger('identity_number');
            $table->enum('gender',['male','female']);
            $table->date('date_of_birth');
            $table->string('phone_number');
            $table->string('occupation');
            $table->enum('marital_status',['single','married']);
            $table->enum('relation',['wife','husband','child']);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_members');
    }
};
