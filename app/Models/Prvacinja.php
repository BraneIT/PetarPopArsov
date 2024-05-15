<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prvacinja extends Model
{
    protected $table = 'prvacinja';
    protected $fillable = ['title', 'document_path', 'type', 'year'];
    use HasFactory;
}
