<?php

namespace App\Services;

use App\Http\Requests\BookRequest;
use App\Models\Barrow;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;


class BarrowService
{


    /**
     * Create Barrow Request
     *
     * @param Authenticatable $user
     * @param BookRequest $request
     * @return mixed
     */
    public function createBarrow(Authenticatable $user, BookRequest $request)
    {
        $barrow = Barrow::insert([
            'user_id' => $user->id,
            'book_id' => $request->input('book_id'),
            'request_date' => $request->input('startDate'),
            'return_date' => $request->input('endDate'),
            'status' => 'pending',
            'sent_code' => '',
            'shipping_company' => '',
            'return_status' => 0,
            'note' => $request->input('note'),
        ]);

        if ($barrow)
            Auth::user()->update(['request_count' => Auth::user()->request_count + 1]);

        return $barrow;
    }


    public function removeBarrow($book_id)
    {
        $barrow = Barrow::where('id', $book_id)->delete();
        if ($barrow)
            Auth::user()->update(['request_count' => Auth::user()->request_count - 1]);

        return $barrow;
    }

    public function sendShippingDetails(){

    }

}
