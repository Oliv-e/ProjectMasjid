<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visible extends Model
{
    use HasFactory;
    protected $table = 'visible';
    protected $fillable = ['visible'];
}
