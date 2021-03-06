<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockOpnameDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_opname_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('stock_opname_id');
            $table->bigInteger('item_id');
            $table->integer('jumlah_tercatat');
            $table->integer('jumlah_fisik');
            
            
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
        Schema::dropIfExists('stock_opname_details');
    }
}
