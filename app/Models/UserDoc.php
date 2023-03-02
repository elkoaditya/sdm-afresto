<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDoc extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user_sertifikasi',
        'name',
        'file',
    ];
}
