<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemiliksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemiliks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('shop_name');
            $table->string('shop_address');
            $table->string('owner_address');
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->string('other_info')->nullable();
            $table->string('pict_1');
            $table->string('ktp');
            $table->string('username')->unique();
            $table->string('password');
            $table->integer('status'); //0 = Registered; 1 = Accepted; 2 = Rejected;
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
        Schema::dropIfExists('pemiliks');
    }
}
