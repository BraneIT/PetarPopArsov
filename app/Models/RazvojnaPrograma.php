<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RazvojnaPrograma extends Model
{
    use HasFactory;
    protected $table = 'razvojna_programa';
    protected $fillable = ['title', 'file', 'slug', 'year', 'end_year'];
}
