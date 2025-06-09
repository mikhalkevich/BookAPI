<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookLink extends Model
{
    use HasFactory;
    public $fillable = ['book_id', 'user_id', 'name', 'url'];
    public function book(){
        return $this->belongsTo(Book::class);
    }
}
