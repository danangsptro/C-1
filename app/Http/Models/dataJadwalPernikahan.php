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
}
