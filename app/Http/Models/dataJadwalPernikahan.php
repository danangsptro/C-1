<?php

namespace App\http\Models;

use App\Http\Models\dataPasangan;
use App\User;
use Illuminate\Database\Eloquent\Model;

class dataJadwalPernikahan extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pasangan()
    {
        return $this->belongsTo(dataPasangan::class, 'pasangan_id');
    }

    public static function queryTable(){
        $data = dataJadwalPernikahan::select('SELECT data_jadwal_pernikahans.id,
        data_pasangans.nama_pria,
        data_pasangans.tanggal_lahir_pria,
        data_pasangans.tempat_lahir_pria, data_pasangans.warga_negara_pria,
        data_pasangans.agama_pria, data_pasangans.nama_wanita, data_pasangans.tanggal_lahir_wanita, data_pasangans.tempat_lahir_wanita,
        data_pasangans.warga_negara_wanita, data_pasangans.agama_wanita, data_pasangans.binti
        FROM ((data_jadwal_pernikahans
        INNER JOIN data_pasangans ON data_jadwal_pernikahans.pasangan_id = dat	a_pasangans.id))')->get();
    }
}
