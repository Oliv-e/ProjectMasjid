<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log_History extends Model
{
    use HasFactory;
    protected $table = 'log_history';

    protected $fillable = ([
        'bagian',
        'aktivitas',
        'oleh',
        'keterangan',
        'role'
    ]);
}
