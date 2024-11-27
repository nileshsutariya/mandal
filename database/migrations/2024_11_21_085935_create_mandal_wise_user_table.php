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
        Schema::create('mandal_wise_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mandal_id')->nullable();
            $table->foreign('mandal_id')->references('id')->on('mandal_master')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('user_role');
            $table->boolean('defalult_manager')->default(0)->comment('0 is Deactive , 1 is Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mandal_wise_user');
    }
};
