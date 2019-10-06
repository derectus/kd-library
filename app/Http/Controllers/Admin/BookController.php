<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Requests\Admin\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\City;
use App\Models\Publisher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class BookController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.books.index', [
            'title' => 'Koleksiyonlar',
            'thead' => ['ID', 'Kapak', 'Başlık', 'Yazar', 'Yayınevi', 'Lokasyon', 'Durumu', 'Kategori', 'İşlem'],
            'books' => Book::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.books.create', [
            'title' => 'Koleksiyon Ekle',
            'cities' => City::all(),
            'categories' => Category::all(),
            'authors' => Author::all(),
            'publishers' => Publisher::all()
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param BookRequest $request
     * @return RedirectResponse
     */
    public function store(BookRequest $request)
    {
        //store collection if valitated
        $this->bookService->store($request);
        // return status
        Session::flash('class', 'success');
        Session::flash('message', 'Kullanıcı başarıyla eklendi!');
        return redirect()->route('admin.books.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin.books.edit', [
            'title' => 'Koleksiyon\'u Düzenle',
            'book' => Book::findOrFail($id),
            'cities' => City::all(),
            'categories' => Category::all(),
            'authors' => Author::all(),
            'publishers' => Publisher::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BookRequest $request
     * @param int $id
     * @return Response
     */
    public function update(BookRequest $request, $id)
    {
        $this->bookService->update($request, $id);

        Session::flash('class', 'success');
        Session::flash('message', 'Koleksiyon başarıyla güncellendi!');
        return redirect()->route('admin.books.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        // delete collection
        Book::findOrFail($id)->delete();

        Session::flash('class', 'success');
        Session::flash('message', 'Koleksiyon başarıyla güncellendi!');
        return redirect()->route('admin.books.index');
    }
}
