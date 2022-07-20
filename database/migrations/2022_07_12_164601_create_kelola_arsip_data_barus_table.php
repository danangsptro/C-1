<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelolaArsipDataBarusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelola_arsip_datas', function (Blueprint $table) {
            $table->id();
            $table->string('no_akta');
            $table->string('nama_pria');
            $table->string('nama_wanita');
            $table->string('tanggal_lahir_pria');
            $table->string('tanggal_lahir_wanita');
            $table->string('tempat_lahir_pria');
            $table->string('tempat_lahir_wanita');
            $table->string('warga_negara_pria');
            $table->string('warga_negara_wanita');
            $table->string('tanggal_pernikahan');
            $table->string('tempat_pernikahan');
            $table->string('status_arsip');
            $table->string('binti');
            $table->string('jenis_arsip');
            $table->string('status_pernikahan');
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
        Schema::dropIfExists('kelola_arsip_datas');
    }
}
