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
        Schema::create('barangjadi', function (Blueprint $table) {
            $table->string('id_bj',10)->primary();
            $table->string('nama',40);
            $table->smallInteger('stock_min');
            $table->smallInteger('stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangjadi');
    }
};
