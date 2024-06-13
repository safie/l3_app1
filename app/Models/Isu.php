<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Isu extends Model
{
    use HasFactory;
    protected $table = 'ref_isu';
    protected $fillable = [
        'isu_nama', 'isu_keterangan'
    ];
}
