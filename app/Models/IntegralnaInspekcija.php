<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntegralnaInspekcija extends Model
{
    use HasFactory;
    protected $table = 'integralna_inspekcija';
    protected $fillable = ['title', 'file', 'slug', 'year', 'end_year'];
}
