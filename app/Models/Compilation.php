<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compilation extends Model
{
    use HasFactory;
    public $fillable = ['user_id', 'catalog_id', 'name', 'status'];
    public function books(){
        return $this->belongsToMany(Book::class, 'compilation_books');
    }
    public function catalog(){
        return $this->belongsTo(CatalogBook::class, 'catalog_id');
    }

}
