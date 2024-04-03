<?php

namespace App\Models;

use App\Models\DocumentCategories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Documents extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'file', 'category_id', 'year', 'end_year'];
     public function category()
    {
        return $this->belongsTo(DocumentCategories::class);
    }
}
