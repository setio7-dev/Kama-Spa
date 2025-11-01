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
        Schema::create('close_kas_parents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("opening_kas");
            $table->bigInteger("ending_kas");
            $table->bigInteger("total_debit");
            $table->bigInteger("total_credit");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('close_kas_parents');
    }
};
