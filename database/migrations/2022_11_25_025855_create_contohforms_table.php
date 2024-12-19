<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contohform', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_dokumen');
            $table->string('gambar_dokumen')->nullable();
            $table->date('tgl_rilis');
            $table->string('klasifikasi_dokumen');
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
        Schema::dropIfExists('contohform');
    }
};
