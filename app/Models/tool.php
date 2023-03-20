<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tool extends Model
{
    use HasFactory;
    protected $table='alat';
    protected $fillable=['nama_alat','keterangan','resep_idresep'];
}
