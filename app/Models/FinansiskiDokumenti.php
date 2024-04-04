<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinansiskiDokumenti extends Model
{
    use HasFactory;
    protected $table = 'finansiski_dokumenti';
    protected $fillable = ['title', 'file', 'slug', 'category_id', 'year', 'end_year', 'finance_category_id'];
}
