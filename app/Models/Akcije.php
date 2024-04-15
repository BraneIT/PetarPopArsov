<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akcije extends Model
{
    use HasFactory;
    protected $table = 'actions';
    protected $fillable = ['name', 'image_path' , 'content', 'slug'];
}
