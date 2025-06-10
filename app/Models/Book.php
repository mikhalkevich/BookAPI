<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use EloquentFilter\Filterable;
class Book extends Model implements HasMedia
{
    use Filterable, InteractsWithMedia, HasFactory;
    public $fillable = ['name', 'catalog_book_id', 'author_id', 'publishing_id', 'ibsn', 'status', 'year', 'user_id', 'description','language', 'image'];
    public function author(){
        return $this->belongsTo(BookAuthor::class, 'author_id');
    }
    public function publishing(){
        return $this->belongsTo(BookPublishing::class, 'publishing_id');
    }
    public function covers(){
        return $this->hasMany(BookCover::class, 'book_id');
    }
    public function links(){
        return $this->hasMany(BookLink::class, 'book_id');
    }
    public function reviews(){
        return $this->hasMany(BookReview::class, 'book_id');
    }
    public function catalogs(){
        return $this->belongsToMany(CatalogBook::class, 'book_catalog', 'book_id', 'catalog_book_id');
    }
}

