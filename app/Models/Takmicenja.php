<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Takmicenja extends Model
{
    use HasFactory;
    protected $table = 'takmicenja';
    protected $fillable = ['title', 'file', 'slug', 'year', 'end_year'];
}
