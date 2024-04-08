<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedjuetnickaIntegracija extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'medjuetnicka_integracija';
    protected $fillable = ['title', 'file', 'slug', 'category_id', 'year', 'end_year'];
}
