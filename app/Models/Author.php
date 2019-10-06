<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Author extends Model
{
    public $timestamps = false;

    /**
     *  The attributes that are assignable.
     * @var array
     * */
    protected $fillable = [
        'slug', 'name'
    ];

    /**
     * Many to Many relation between Authors and Books
     * @return BelongsToMany
     */
    public function authorBooks()
    {
        return $this->belongsToMany('\App\Models\Book', 'author_books');
    }
}
