<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaSubindiiotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa_subindiiot', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('subindiiot_id');
            $table->bigInteger('siswa_id');
            $table->string('skor')->nullable();
            $table->string('deskripsi')->nullable();
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
        Schema::dropIfExists('siswa_subindiiot');
    }
}
