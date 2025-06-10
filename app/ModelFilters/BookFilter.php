<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Faker\Core\Number;

class BookFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];
    public function year($value){
       return $this->where('year', $value);
    }
    public function name($value){
        return $this->where('name', 'LIKE','%'.$value.'%');
    }
    public function catalog($value){
        $value_int = (int) $value;
        return $this->related('catalogs','catalog_book_id','=', $value_int);
    }
}
