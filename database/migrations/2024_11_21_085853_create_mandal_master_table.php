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
        Schema::create('mandal_master', function (Blueprint $table) {
            $table->id();
            $table->string('mandal_name')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('unique_code');
            $table->string('installment_amount');
            $table->string('interest_rate');
            $table->string('tennert');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mandal_master');
    }
};
