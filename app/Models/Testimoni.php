<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pengguna;

class Testimoni extends Model
{
    use HasFactory;

    public function Pengguna(){
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }

}
