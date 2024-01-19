<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    use HasFactory;
    protected $illabel = ['users_id', 'pengaduan_id', 'tanggaltanggapan', 'tanggapan'];
    protected $table = 'tanggapan';

    //relasi balik ke pengaduan
    public function pengaduan()
    {
        return $this->belongsTo('pengaduan', 'pengaduan_id', 'id');
    }

    //relasi balik ke user
    public function user()
    {
        return $this->belongsTo('users', 'users_id', 'id');
    }
}
