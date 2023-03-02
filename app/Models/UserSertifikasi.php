<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSertifikasi extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id_user',
        'id_sertifikasi',
        'nomor',
        'start_date',
        'end_date',
    ];

    public function doc(){
        return $this->hasMany(UserDoc::class, 'id_user_sertifikasi', 'id');
    }
}
