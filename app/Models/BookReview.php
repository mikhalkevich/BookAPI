<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookReview extends Model
{

    use HasFactory;
    public $fillable = ['user_id','product_id','message','name','email'];
    public function book(){
        return $this->belongsTo(Book::class, 'product_id');
    }

}
