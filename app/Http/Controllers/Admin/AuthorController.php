<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class AuthorController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.authors.index', [
            'title' => 'Koleksiyonlar',
            'thead' => ['ID', 'Adı', 'İşlem'],
            'authors' => Author::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.authors.create', [
            'title' => 'Yazar Ekle'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        // validate requested input
        $request->validate([
            'name' => 'required|string|max:75'
        ]);

        // create author
        $author = $this->authorService->store($request);

        // if have any problem occurs
        if (!$author) {
            Session::flash('class', 'success');
            Session::flash('message', 'Beklenmeyen bir hata meydana geldi, lütfen tekrar deneyiniz !');
        }

        Session::flash('class', 'success');
        Session::flash('message', 'Yazar başarıyla eklendi!');
        return redirect()->route('admin.authors.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $author = Author::findOrFail($id);
        return view('admin.authors.edit', [
            'author' => $author,
            'title' => $author->name
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        // validate requested input
        $request->validate([
            'name' => 'required|string|max:75'
        ]);

        $author = $this->authorService->update($request->input(['name']), $id);

        // if have any problem occurs
        if (!$author) {
            Session::flash('class', 'success');
            Session::flash('message', 'Beklenmeyen bir hata meydana geldi, lütfen tekrar deneyiniz !');
        }

        Session::flash('class', 'success');
        Session::flash('message', 'Yazar başarıyla güncellendi!');
        return redirect()->route('admin.authors.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        // delete author
        Author::findOrFail($id)->delete();

        Session::flash('class', 'success');
        Session::flash('message', 'Yazar başarıyla silindi!');
        return redirect()->route('admin.authors.index');
    }
}
