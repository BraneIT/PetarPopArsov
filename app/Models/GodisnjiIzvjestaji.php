<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GodisnjiIzvjestaji extends Model
{
    use HasFactory;
    protected $table = 'godisnji_izvjestaji';
    protected $fillable = ['title', 'file', 'slug', 'year', 'category_id', 'end_year'];
}
