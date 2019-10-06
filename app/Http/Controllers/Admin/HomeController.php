<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

class HomeController extends AdminController
{
    /**
     * Show the application dashboard.
     *
     * @return Renderable
     * @throws Exception
     */
    public function index()
    {
        $data = $this->homeService->index();

        return view('admin.dashboard', $data);
    }
}
