<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prvacinja extends Model
{
    use HasFactory;
    protected $table = 'prvacinja';
    protected $fillable = ['image_path', 'content'];
}
