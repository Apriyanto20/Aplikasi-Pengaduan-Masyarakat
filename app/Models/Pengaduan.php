<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $fillable = ['masyarakat_id', 'kategori_id', 'tanggalpengaduan', 'isipengaduan'. 'foto', 'status'];
    protected $table = 'pengaduan';

    //relasi balik ke kategori
    public function kategoripengaduan()
    {
        return $this->belongsTo('kategoripengaduan', 'kategori_id', 'id');
    }

    //relasi ke tanggapan
    public function tanggapan()
    {
        return $this->hasMany('tanggapan', 'pengaduan_id', 'id');
    }

    //relasi balik ke kategori
    public function user()
    {
        return $this->belongsTo('users', 'masyarakat_id', 'id');
    }

}
