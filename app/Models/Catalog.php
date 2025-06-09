<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory, SoftDeletes;
    public $fillable = ['name','body'];
    public function products(){
        return $this->belongsToMany(Product::class, 'catalog_product');
    }
}
