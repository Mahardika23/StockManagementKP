<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transactionable_type');
            $table->integer('transactionable_id');
            $table->mediumInteger('account_no');
            // $table->float('');
            $table->float('amount');
            $table->text('catatan');
            $table->timestamps();
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
        Schema::dropIfExists('journal_transactions');
    }
}
