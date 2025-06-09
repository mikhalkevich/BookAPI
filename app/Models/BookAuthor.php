<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookAuthor extends Model
{
    use HasFactory;
    public $fillable = ['name', 'full_name', 'body', 'picture'];

    public function book(){
        return $this->hasMany(Book::class,'author_id');
    }


}
