<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    use HasFactory;
    public $fillable = ['model_name', 'model_id', 'status'];
    public function book(){
        return $this->belongsTo(Book::class, 'model_id');
    }
    public function book_cover(){
        return $this->belongsTo(BookCover::class, 'model_id');
    }
    public function book_author(){
        return $this->belongsTo(BookAuthor::class, 'model_id');
    }
    public function book_review(){
        return $this->belongsTo(BookReview::class, 'model_id');
    }
}
