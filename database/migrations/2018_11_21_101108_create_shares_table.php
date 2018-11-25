<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSharesTable extends Migration
{ /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shares', function (Blueprint $table) {
            $table->increments('id');

            $table->string('Id_peminjam');
            $table->string('Nama');
            $table->string('share_name');
            $table->string('share_price');
            $table->string('share_qty');
            $table->timestamps();
        });
    }
}