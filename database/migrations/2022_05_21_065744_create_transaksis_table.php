<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_barang');
            $table->integer('jumlah');
            $table->uuid('store_id');
            $table->uuid('penanggung_jawab_id');
            $table->timestamps();
            $table->foreign('id_barang')->references('id')->on('barangs');
            $table->foreign('store_id')->references('id')->on('stores');
            $table->foreign('penanggung_jawab_id')->references('id')->on('pegawais');
        });
        Schema::table('transaksis', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
