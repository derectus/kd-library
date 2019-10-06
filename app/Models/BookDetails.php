<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\City;

class BookDetails extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'book_id', 'location_id', 'return_date', 'availability'
    ];

    /**
     * The attributes.
     * @var array
     */
    protected $appends = [
        'location'
    ];

    /**
     * One to One relation between book_details and books
     * @return BelongsTo
     */
    public function detailBooks()
    {
        return $this->belongsTo('App\Models\Book', 'id');
    }

    /**
     * @return array
     */
    public function getLocationAttribute()
    {
        return City::where('id', $this->location_id)->first();
    }
}
