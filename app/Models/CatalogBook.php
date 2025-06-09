<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogBook extends Model
{
    use HasFactory;
    public function compilations(){
        return $this->hasMany(Compilation::class, 'catalog_id');
    }
}
