<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('obats', function (Blueprint $table) {
        $table->string('jenis')->nullable();  // Tambahkan kolom jenis
        $table->string('satuan')->nullable(); // Tambahkan kolom satuan
        $table->integer('jumlah')->nullable(); // Tambahkan kolom jumlah
    });
}

public function down()
{
    Schema::table('obats', function (Blueprint $table) {
        $table->dropColumn(['jenis', 'satuan', 'jumlah']);
    });
}

};
