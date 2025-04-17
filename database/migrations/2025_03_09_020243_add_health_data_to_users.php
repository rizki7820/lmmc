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
        Schema::table('users', function (Blueprint $table) {
            $table->string('tekanan_darah')->nullable();
            $table->string('frekuensi_nadi')->nullable();
            $table->string('frekuensi_napas')->nullable();
            $table->string('suhu_tubuh')->nullable();
            $table->string('berat_badan')->nullable();
            $table->string('tinggi_badan')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'tekanan_darah',
                'frekuensi_nadi',
                'frekuensi_napas',
                'suhu_tubuh',
                'berat_badan',
                'tinggi_badan'
            ]);
        });
    }
};
