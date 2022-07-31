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
            $table->string('no_akta',30);
            $table->string('nama_pria',50);
            $table->string('nama_wanita',50);
            $table->date('tanggal_lahir_pria',20);
            $table->date('tanggal_lahir_wanita',20);
            $table->string('tempat_lahir_pria',20);
            $table->string('tempat_lahir_wanita',20);
            $table->string('warga_negara_pria',20);
            $table->string('warga_negara_wanita',20);
            $table->date('tanggal_pernikahan',20);
            $table->string('tempat_pernikahan',100);
            $table->string('status_arsip',20);
            $table->string('binti',30);
            $table->string('bin',30);
            $table->string('jenis_arsip',30);
            $table->string('status_pernikahan',20);
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
