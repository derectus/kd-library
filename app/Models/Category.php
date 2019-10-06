<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'slug', 'name'
    ];

    /**
     * Many to Many relation between categories and books
     * @return hasMany
     */
    public function categoryBooks()
    {
        return $this->hasMany('\App\Models\Book', 'category_id');
    }
}
