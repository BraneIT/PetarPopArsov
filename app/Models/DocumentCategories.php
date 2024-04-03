<?php

namespace App\Models;

use App\Models\Documents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocumentCategories extends Model
{
    use HasFactory;
    protected $table = 'document_categories';
    protected $fillable = ['name'];
     public function documents()
    {
        return $this->hasMany(Documents::class);
    }
}
