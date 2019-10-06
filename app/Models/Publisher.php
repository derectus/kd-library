<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Publisher extends Model
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
     * One to Many relation between publishers and books
     * @return HasMany
     */
    public function publisherBooks()
    {
        return $this->hasMany('\App\Models\Book', 'publisher_id');
    }

}
