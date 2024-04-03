<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IzvjestajOdSamoevaluacija extends Model
{
    use HasFactory;
    protected $table = 'izvjestaji_od_samoevaluacija';
    protected $fillable = ['title', 'file', 'slug', 'year', 'end_year'];
}
