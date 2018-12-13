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

            $table->string('nim');
            $table->string('nama');
            $table->string('id_sepeda');
            $table->string('jenis_sepeda');
            $table->string('status');
            $table->timestamps();
        });
    }
}