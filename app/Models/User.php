<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'nik',
    //     'name',
    //     'email',
    //     'password',
    //     'jenis_kelamin',
    //     'alamat',
    //     'role',
    //     'notelepon'
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

        //relasi  ke pengaduan
        public function pengaduan()
        {
            return $this->hasMany(Pengaduan::class, 'masyarakat_id', 'id');
        }


    //relasi ke tanggapan
    public function Tanggapan()
    {
        return $this->hasMany('users_id', 'pengaduan_id', 'id');
    }

    protected $guarded = ['id'];
}
