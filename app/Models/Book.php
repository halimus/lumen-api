<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {
    
    /*
     * 
     */
    protected $table = 'books';
    protected $primaryKey = 'book_id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'author', 'isbn', 'pages_count', 'published_date', 'language_id'
    ];
    
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];
    
}