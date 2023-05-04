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
        Schema::create('data_transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('toko_id');
            $table->foreignId('pembeli_id');
            $table->string('nama_pembeli',100);
            $table->string('alamat');
            $table->string('gambar');
            $table->string('nama_barang',50);
            $table->bigInteger('harga');
            $table->integer('jumlah');
            $table->bigInteger('total_harga');
            $table->enum('status_transaksi',['Pembayaran Pembeli','Verifikasi Admin','Konfirmasi Penjual','Sedang Dikirim','Selesai','Gagal']);
            $table->timestamp('tanggal_transaksi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_transaksis');
    }
};
