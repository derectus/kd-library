<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CollectionsController extends Controller
{
    /**
     *
     * @return Factory|View
     */
    public function index()
    {

        return view('collections.collection', [
            'books' => Book::paginate(10)
        ]);
    }

    /**
     * @param $Author
     * @return Lists the materials in the Author by slug value
     */
    public function author($Author)
    {
        return view('collections.collection', [
            'books' => Author::where('slug', $Author)
                ->firstOrFail()
                ->authorBooks()
                ->paginate(10)
        ]);
    }

    /**
     * @param $Category
     * @return Lists the materials in the category by slug value
     */
    public function category($Category)
    {
        return view('collections.collection', [
            'books' => Category::where('slug', $Category)
                ->firstOrFail()
                ->categoryBooks()
                ->paginate(10)
        ]);
    }

    /**
     * @param $Publisher
     * @return Lists the materials in the Publisher by slug value
     */
    public function publisher($Publisher)
    {
        return view('collections.collection', [
            'books' => Publisher::where('slug', $Publisher)
                ->firstOrFail()
                ->publisherBooks()
                ->paginate(10)
        ]);
    }

    /**
     * Search in books at collections
     *
     * @return Factory|View
     */
    public function search()
    {
        $query = request()->input('search');
        $books = Book::where('title', 'LIKE', "%$query%")
            ->orWhere('description', 'LIKE', "%$query%")
            ->paginate(10);
        request()->flash();

        return view('collections.collection', ['books' => $books]);
    }
}
