<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gambar extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class,'id_pengaduan','id');
    }
}
