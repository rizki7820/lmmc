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
        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->string('nama_orang_tua')->nullable()->change();
            $table->string('nik_anak', 16)->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->string('nama_orang_tua')->nullable(false)->change();
            $table->string('nik_anak', 16)->nullable(false)->change();
        });
    }
};
