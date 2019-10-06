<?php

namespace App\Http\Controllers;

use App\Models\Barrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarrowController extends Controller
{
    /**
     * Show Requests Page
     * @return Factory|View
     */
    public function requests()
    {
        return view('auth.barrows', [
            'user' => Auth::user(),
            'requests' => Barrow::where('user_id', Auth::user()->id)
                ->where('status', 'pending')->orderByDesc('id')->paginate(8)
        ]);
    }

    public function requests_history()
    {
        return view('auth.barrows-history', [
            'user' => Auth::user(),
            'requests' => Barrow::where('user_id', Auth::user()->id)
                ->where('status', '!=', 'pending')->orderByDesc('id')->paginate(8)
        ]);
    }
}
