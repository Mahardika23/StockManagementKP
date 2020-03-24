<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_barang');
            $table->bigInteger('kategori_barang');
            $table->string('nama_barang');
            $table->string('jenis_barang');
            $table->bigInteger('satuan_unit');
            $table->integer('harga_retail');
            $table->integer('harga_grosir');
            $table->float('hpp',11,3);
            $table->bigInteger('kode_pajak');
            $table->string('item_image');
            $table->bigInteger('supplier_id');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
