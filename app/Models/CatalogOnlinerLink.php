<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogOnlinerLink extends Model
{
    use HasFactory;
    public $fillable = ['catalog_onliner_id', 'name', 'url','attr_href'];
    public function catalog(){
        return $this->belongsTo(CatalogOnliner::class);
    }
}
