<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\BookRequest;
use App\Models\Book;
use App\Models\BookDetails;
use Exception;
use Storage;

class BookService
{

    /**
     * Store a newly created resource in storage.
     *
     * @param BookRequest $request
     * @return mixed
     */
    public function store(BookRequest $request)
    {
        $slug = str_slug($request->input('title'));
        $cover = $request->file('cover');
        Storage::disk('public')->put($slug . 'jpg', file_get_contents($cover));

        $book = Book::create([
            'title' => $request->input('title'),
            'slug' => $slug,
            'authors' => $request->input('authors'),
            'category_id' => $request->input('category'),
            'publisher_id' => $request->input('publisher'),
            'type' => $request->input('type'),
            'isbn' => $request->input('edition'),
            'publication_year' => $request->input('publication_year'),
            'description' => $request->input('description')
        ]);


        $books = BookDetails::create([
            'book_id' => $book->id,
            'location_id' => $request->input('location_id'),
            'availability' => true
        ]);

        return $books;
    }


    public function update(BookRequest $request, $id)
    {

        $book = Book::findOrFail($id);
        $validated = $request->all();
        $slug = str_slug($validated['title']);

        // Upload new image
        if ($request->file('cover')) {
            $cover = $validated['cover'];
            Storage::disk('public')->delete($book->slug . '.jpg');
            Storage::disk('public')->put($slug . '.jpg', file_get_contents($cover));
        } else if ($book->slug != $slug) { // if changed title

            Storage::disk('public')->move($book->slug . '.jpg', $slug . '.jpg');
        }

        $book->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'authors' => $validated['authors'],
            'category_id' => $validated['category'],
            'publisher_id' => $validated['publisher'],
            'type' => $validated['type'],
            'isbn' => $validated['edition'],
            'publication_year' => $validated['publication_year'],
            'description' => $validated['description']
        ]);

        $updated = $book->bookDetails->update([
            'location_id' => $validated['location_id'],
        ]);

        return $updated;
    }


}
