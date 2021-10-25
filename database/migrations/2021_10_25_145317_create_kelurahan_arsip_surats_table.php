<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelurahanArsipSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelurahan_arsip_surats', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat');
            $table->enum('kategori_surat', ['Undangan', 'Pengumuman', 'Nota Dinas', 'Pemberitahuan']);
            $table->string('judul_surat');
            $table->string('file_surat');
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
        Schema::dropIfExists('kelurahan_arsip_surats');
    }
}
