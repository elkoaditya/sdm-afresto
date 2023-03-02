<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sertifikasi extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name', 'type'
    ];
    public function user(){
        return $this->hasOne(UserSertifikasi::class, 'id_sertifikasi', 'id');
    }
}
