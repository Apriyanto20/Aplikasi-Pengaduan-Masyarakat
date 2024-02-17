<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $fillable = ['masyarakat_id', 'kategori_id','judul', 'tanggalpengaduan', 'isipengaduan', 'status'];
    protected $table = 'pengaduan';

    //relasi balik ke kategori
    public function kategoripengaduan()
    {
        return $this->belongsTo(KategoriPengaduan::class, 'kategori_id', 'id');
    }

    //relasi ke tanggapan
    public function tanggapan()
    {
        return $this->hasMany(Tanggapan::class, 'pengaduan_id', 'id');
    }

    //relasi balik ke kategori
    public function user()
    {
        return $this->belongsTo(User::class, 'masyarakat_id', 'id');
    }

    public function gambar()
    {
        return $this->hasMany(gambar::class, 'id_pengaduan', 'id');
    }

}
