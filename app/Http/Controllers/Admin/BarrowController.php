<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Models\Barrow;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BarrowController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $barrow = Barrow::find(1);

        return view('admin.barrows.index', [
            'title' => 'İstekler',
            'thead' => ['ID', 'Durumu', 'Koleksiyon', 'Kullanıcı', 'İstek Tarihi', 'Dönüş Tarihi', 'Gönderim Bilgileri', 'Dönüş Durumu'],
            'barrows' => Barrow::all()
        ]);
    }

}
