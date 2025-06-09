<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogOnliner extends Model
{
    use HasFactory;
    public $fillable = ['data_id', 'name'];
    public function links(){
        return $this->hasMany(CatalogOnlinerLink::class);
    }
}
