<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCover extends Model
{
    use HasFactory;
    public $fillable = ['book_id', 'src'];
    public function book(){
        return $this->belongsTo(Book::class);
    }
}
