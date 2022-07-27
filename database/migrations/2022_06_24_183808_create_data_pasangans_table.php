<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPasangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pasangans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pria',50);
            $table->text('foto_pria');
            $table->date('tanggal_lahir_pria', 20);
            $table->string('tempat_lahir_pria', 20);
            $table->string('warga_negara_pria', 20);
            $table->string('agama_pria', 20);
            $table->string('nama_wanita', 50);
            $table->text('foto_wanita');
            $table->date('tanggal_lahir_wanita',20);
            $table->string('tempat_lahir_wanita',20);
            $table->string('warga_negara_wanita', 20);
            $table->string('agama_wanita', 20);
            $table->string('binti', 20);
            $table->string('status_pernikahan', 20);
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
        Schema::dropIfExists('data_pasangans');
    }
}
