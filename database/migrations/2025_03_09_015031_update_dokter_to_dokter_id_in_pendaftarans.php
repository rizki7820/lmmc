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
            // Hapus kolom lama jika ada
            if (Schema::hasColumn('pendaftarans', 'dokter')) {
                $table->dropColumn('dokter');
            }

            // Tambahkan dokter_id sebagai foreign key
            $table->unsignedBigInteger('dokter_id')->after('user_id')->nullable();
            $table->foreign('dokter_id')->references('id')->on('dokters')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            // Hapus foreign key dan dokter_id jika rollback
            $table->dropForeign(['dokter_id']);
            $table->dropColumn('dokter_id');

            // Kembalikan kolom dokter jika ingin rollback
            $table->string('dokter')->nullable();
        });
    }
};
