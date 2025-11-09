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
        Schema::create('close_kas_children', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("kas_parent")->unsigned();
            $table->bigInteger("credit");
            $table->bigInteger("debit");
            $table->text("type_payment");
            $table->string("proof_payment");
            $table->string("desc");
            $table->string("date");
            $table->text("notes");

            $table->foreign("kas_parent")->references("id")->on("close_kas_parents")->onDelete("CASCADE");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('close_kas_children');
    }
};
