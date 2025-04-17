<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('obats', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Nama obat
            $table->string('kategori'); // Kategori (tablet, sirup, dll)
            $table->integer('stok'); // Stok obat
            $table->decimal('harga', 10, 2); // Harga obat
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('obats');
    }
};
