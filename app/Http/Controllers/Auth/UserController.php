<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\ProfileUpdateRequest;
use App\Models\City;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**s
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('verified');
    }

    /**
     * Show the profile details page.->id
     *
     * @return Response
     */
    public function profile()
    {
        return view('auth.profile', [
            'user' => Auth::user(),
            'cities' => City::all()
        ]);
    }

    /**
     * Ban notice page.
     *
     * @return Response
     */
    public function banned()
    {
        return view('auth.banned');
    }

    public function update(ProfileUpdateRequest $request)
    {
        $data = $request->validated();

        if ($request->input('password'))
            $data['password'] = Hash::make($request->input('password'));

        Auth::user()->update($data);
        return redirect()->route('profile')->with('class', 'success')
            ->with('message', 'Profiliniz başarılı bir şekilde güncellendi !');
    }
}
