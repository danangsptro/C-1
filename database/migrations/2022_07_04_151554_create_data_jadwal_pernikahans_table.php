<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataJadwalPernikahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_jadwal_pernikahans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('pasangan_id')->unsigned();
            $table->date('tanggal_pernikahan',20);
            $table->string('jam_pernikahan',20);
            $table->string('tempat',100);
            $table->string('status',20);
            $table->string('no_akta',30)->nullable();
            $table->string('status_arsip',20);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pasangan_id')->references('id')->on('data_pasangans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_jadwal_pernikahans');
    }
}
