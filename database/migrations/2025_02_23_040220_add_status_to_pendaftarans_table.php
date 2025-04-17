<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->string('status')->default('Menunggu')->after('nomor_antrian'); // Ganti `some_column` dengan kolom sebelumnya
        });
    }

    public function down()
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
