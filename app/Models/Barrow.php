<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Barrow extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'book_id', 'user_id', 'status', 'request_date', 'return_date', 'return_status', 'sent_code', 'shipping_company'
    ];

    /**
     * The attribute
     *
     * @var array
     */
    protected $appends = [
        'book'
    ];


    /**
     * The many to one relation between request and user
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }


    /**
     * The accessor of book attribute
     *
     * @return mixed
     */
    public function getBookAttribute()
    {
        return Book::where('id', $this->book_id)->get();
    }
}
