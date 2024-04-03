<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Erasmus extends Model
{
    use HasFactory;

    protected $table = 'erasmus';
    protected $fillable = ['name', 'path', 'start_date', 'end_date'];
}
