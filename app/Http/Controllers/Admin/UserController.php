<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\AdminController;
use App\Http\Requests\Admin\UserCreateRequest;
use App\Models\Barrow;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class UserController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        return view('admin.users.index', [
            'title' => 'Kullanıcılar',
            'thead' => ['ID', 'Yönetici', 'Ban Durumu', 'Adı Soyadı', 'E-Posta', 'Adres', 'Telefon', 'E-Posta Onay', 'İşlem'],
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.users.create', [
            'title' => 'Kullanıcı Ekle',
            'cities' => City::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserCreateRequest $request
     * @return Response
     */
    public function store(UserCreateRequest $request)
    {
        // addtional valitaion
        $request->validate([
            'email' => ['required', 'email', 'unique:users'],
        ]);

        // create user
        $this->userService->store($request);

        // return status
        Session::flash('class', 'success');
        Session::flash('message', 'Kullanıcı başarıyla eklendi!');
        return redirect()->route('admin.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', [
            'user' => $user,
            'cities' => City::all(),
            'requests' => Barrow::where('user_id', $user->id)->get(),
            'title' => $user->name
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserCreateRequest $request
     * @param int $id
     * @param $ope
     * @return Response
     */
    public function update(UserCreateRequest $request, $id)
    {
        // update user
        $this->userService->update($request, $id);

        // return status
        Session::flash('class', 'success');
        Session::flash('message', 'Kullanıcı başarıyla güncellendi!');
        return redirect()->route('admin.users.edit', $id);
    }

    public function bookStatus(Request $request, $userID, $barrowID)
    {
        // assign collection to user
       $user = $this->userService->assignCollectionToUser($request, $userID, $barrowID);

       // if occurs any problem
       if (!$user)
           return redirect()->route('admin.users.edit', $userID)
               ->with('class', 'danger')
               ->with('message', __('Bir problem oluştu! Lütfen tekrar deneyiniz.'));

      return redirect()->route('admin.users.edit', $userID)
            ->with('class', 'success')
            ->with('message', __('İşlem başarı ile gerçekleşti.'));
    }

}
