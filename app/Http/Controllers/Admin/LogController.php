<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class LogController extends AdminController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.logs.index', [
            'title' => 'Kullanıcı Logları',
            'thead' => ['id', 'User ID / Name', 'E-posta', 'Eylem', 'IP Adresi', 'Tarih'],
            'logs' => Log::all()
        ]);
    }
}
