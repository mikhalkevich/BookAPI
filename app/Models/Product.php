<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    public $fillable = ['name', 'description', 'description_small', 'price', 'price_min','price_max', 'code', 'user_id', 'status', 'full_name','extended_name', 'description_small', 'key', 'catalog_onliner_link_id'];
    public function catalogs(){
        return $this->belongsToMany(Catalog::class, 'catalog_product');
    }
    public function images(){
        return $this->hasMany(ProductImage::class);
    }
}
