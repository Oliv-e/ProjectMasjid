<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;
    protected $table = 'keuangan';
    protected $fillable = [
        'debet',
        'kredit',
        'keterangan',
        'diarsipkan',
        'created_at'
    ];
}
