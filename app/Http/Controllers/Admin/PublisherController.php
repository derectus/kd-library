<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class PublisherController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.publishers.index', [
            'title' => 'Yayınevleri',
            'thead' => ['ID', 'Adı', 'İşlem'],
            'publishers' => Publisher::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.publishers.create', [
            'title' => 'Yayınevi Ekle'
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
        $publisher = $this->publisherService->store($request);

        // if have any problem occurs
        if (!$publisher) {
            Session::flash('class', 'success');
            Session::flash('message', 'Beklenmeyen bir hata meydana geldi, lütfen tekrar deneyiniz !');
        }

        Session::flash('class', 'success');
        Session::flash('message', 'Yayınevi başarıyla eklendi!');
        return redirect()->route('admin.publishers.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $publisher = Publisher::findOrFail($id);
        return view('admin.publishers.edit', [
            'publisher' => $publisher,
            'title' => $publisher->name
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

        $publisher = $this->publisherService->update($request->input(['name']), $id);

        // if have any problem occurs
        if (!$publisher) {
            Session::flash('class', 'success');
            Session::flash('message', 'Beklenmeyen bir hata meydana geldi, lütfen tekrar deneyiniz !');
        }

        Session::flash('class', 'success');
        Session::flash('message', 'Yayınevi başarıyla güncellendi!');
        return redirect()->route('admin.publishers.edit', $id);
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
        Publisher::findOrFail($id)->delete();

        Session::flash('class', 'success');
        Session::flash('message', 'Yayınevi başarıyla silindi!');
        return redirect()->route('admin.publishers.index');
    }
}
