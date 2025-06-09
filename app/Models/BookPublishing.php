<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookPublishing extends Model
{
    use HasFactory;
    public $fillable = ['name', 'link', 'body', 'city'];
}
