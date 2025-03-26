<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelModel extends Model
{
    use HasFactory;

    protected $table = 'm_level';  // Pastikan ini sesuai dengan tabel di database
    protected $primaryKey = 'level_id';
    public $timestamps = false;

    protected $fillable = ['level_id', 'nama_level'];
}
