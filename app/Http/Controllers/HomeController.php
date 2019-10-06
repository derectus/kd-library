<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application homepage.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('pages.home');
    }

    /**
     * Show the application contact page
     *
     * @return Renderable
     */
    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * Show the application contact page
     *
     * @return Renderable
     */
    public function faq()
    {
        return view('pages.faq');
    }
}
