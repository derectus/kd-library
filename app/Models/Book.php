<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Category;

class Book extends Model
{
    use SoftDeletes;
    /**
     *  The attributes that are assignable.
     * @var array
     */
    protected $fillable = [
        'slug', 'title', 'authors', 'category_id', 'publisher_id', 'type', 'isbn', 'edition', 'publication_year', 'description'
    ];

    /**
     * Attributes
     * @var array
     */
    protected $appends = [
        'categories', 'publishers', 'author', 'copies'
    ];

    /**
     * One to One relation between book_details and books
     * @return HasOne
     */
    public function bookDetails()
    {
        return $this->hasOne('\App\Models\BookDetails', 'book_id');
    }

    /**
     * Many to Many relation between authors and books
     * @return BelongsToMany
     */
    public function bookAuthors()
    {
        return $this->belongsToMany('\App\Models\Author', 'author_books');
    }

    /**
     * Many to One relation between publishers and books
     * @return HasOne
     */
    public function bookPublishers()
    {
        return $this->hasOne('\App\Models\Publisher', 'publisher_id');
    }

    /**
     * @return HasOne
     */
    public function bookCategory()
    {
        return $this->hasOne('\App\Models\Category', 'id');
    }

    /**
     * Accessor for Author Attribute
     * @return mixed
     */
    public function getAuthorAttribute()
    {
        return Author::whereIn('id', $this->authors)->get();
    }

    /**
     * Accessor for Authors attribute
     * @return string
     */
    public function getAuthorsAttribute($value)
    {
        return json_decode($value, true);
    }

    /**
     * Mutator for Authors attribute
     * @return string
     */
    public function setAuthorsAttribute($value)
    {
        $value = array_map(function ($val) {
            return (int)$val;
        }, $value);

        $this->attributes['authors'] = json_encode($value);
    }

    /**
     * Accessor for Categories attribute
     * @return mixed
     */
    public function getCategoriesAttribute()
    {
        return Category::where('id', $this->category_id)->get();
    }

    /**
     * Accessor for Publisher attribute
     * @return mixed
     */
    public function getPublishersAttribute()
    {
        return Publisher::where('id', $this->publisher_id)->get();
    }

    /**
     * Accessor for Copies attribute
     * @return mixed
     */
    public function getCopiesAttribute()
    {
        return Book::where('slug', $this->slug)->count();
    }


}
