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
        Schema::create('soap', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftaran_id')->constrained()->onDelete('cascade');
            $table->string('subjektif_dokter')->nullable();
            $table->string('objektif_perawat')->nullable();
            $table->string('objektif_dokter')->nullable();
            $table->string('assesment_dokter')->nullable();
            $table->string('planning_dokter')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soap');
    }
};
