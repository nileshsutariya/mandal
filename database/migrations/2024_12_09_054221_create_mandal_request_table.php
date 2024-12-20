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
        Schema::create('mandal_request', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mandal_id');
            $table->foreign('mandal_id')->references('id')->on('mandal_master')->onDelete('cascade');
            $table->unsignedBigInteger('requested_to_userid');
            $table->foreign('requested_to_userid')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('requested_by_user_id');
            $table->foreign('requested_by_userid')->references('id')->on('users')->onDelete('cascade');
            $table->enum('status', ['0', '1', '2'])->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mandal_request');
    }
};
