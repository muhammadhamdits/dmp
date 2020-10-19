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
            $table->id();
            $table->dateTime('tanggal', 0)->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('pemilik_id')->constrained();
            $table->integer('status'); //0 = Cart; 1 = Proses; 2 = Acc; 3 = Ditolak
            $table->integer('payment'); //0 = COD; 1 = Transfer Bank
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
        Schema::dropIfExists('transaksis');
    }
}
