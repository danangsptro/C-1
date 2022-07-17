<?php

namespace App\Http\Models;

use App\http\Models\dataJadwalPernikahan;
use Illuminate\Database\Eloquent\Model;

class dataPasangan extends Model
{
    protected $guarded = [];

    public function dataPasangan()
    {
        return $this->hasMany(dataJadwalPernikahan::class, 'pasangan_id', 'id');
    }

}
