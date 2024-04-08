<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etvining extends Model
{
    use HasFactory;
    protected $table = 'etvining';
    protected $fillable = ['title', 'file', 'slug', 'category_id', 'year', 'end_year'];
}
