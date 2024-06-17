<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projekti extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $fillable = ['name', 'image_path' , 'content', 'slug', 'year'];
}
