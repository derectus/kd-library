<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookDetails;
use App\Models\City;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BooksController extends Controller
{

    /**
     * @param $Book
     * @return Factory|View
     */
    public function book($Book)
    {
        $book = Book::where('slug', $Book)->firstOrFail();
        $detail_id = Book::where('slug', $Book)->pluck('id')->toArray();
        $details = BookDetails::whereIn('book_id', $detail_id)->get();
        return view('collections.book', [
            'book' => $book,
            'details' => $details,
        ]);
    }

}
