<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicProcurements extends Model
{
    use HasFactory;
    protected $table = 'public_procurements';
    protected $fillable = ['name', 'link', 'type', 'year'];
}
