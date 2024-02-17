<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPengaduan extends Model
{
    use HasFactory;
    protected $fillable  = ['namacategory', 'deskripsi'];
    protected $table = 'kategoripengaduan';

    //relasi ke tabel pengaduan

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class, 'kategori_id', 'id');
    }
}
