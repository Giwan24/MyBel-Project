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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('id_produuct')->nullable();
            $table->string('brand')->nullable();
            $table->string('jenis')->nullable();
            $table->string('nama_produk')->nullable();
            $table->string('material')->nullable();
            $table->string('dimensi')->nullable();
            $table->string('warna_tersedia')->nullable();
            $table->double('harga')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
